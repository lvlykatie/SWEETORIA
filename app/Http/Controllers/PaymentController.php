<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceDetails;

class PaymentController extends Controller
{
    //
    // public function showPaymentPage()
    // {
    //     //return view('page.payment');

    // }

    public function showPaymentPage()
    {
        $selectedProducts = Session::get('selectedProducts', []);
        $productDetails = [];
        $user = Auth::user();

        foreach ($selectedProducts as $item) {
            $product = Product::find($item['productId']);
            if ($product) {
                $productDetails[] = [
                    'product_id' => $product->product_id, // Lưu lại product_id
                    'name' => $product->product_name,
                    'quantity' => $item['quantity'],
                    'price' => $product->product_price,
                    'total' => $product->product_price * $item['quantity'],
                ];
            }
        }

        $total = array_sum(array_column($productDetails, 'total'));

        // Lưu thông tin vào session
        session([
            'name' => $user->user_name ?? null,
            'address' => $user->user_address ?? null,
            'phone' => $user->user_phone ?? null,
            'products' => $productDetails, // Danh sách sản phẩm
            'total' => $total, // Tổng tiền
        ]);
        $vouchers = Voucher::where('enddate', '>=', now()->format('Y-m-d'))  // Chỉ lấy voucher còn hạn
            ->where('minimum_order_value', '<=', $total) // Lọc theo giá trị đơn hàng
            ->get();
        // dd($vouchers,  $total , now());
        return view('page.payment', [
            'products' => $productDetails,
            'total' => $total,
            'date' => now()->format('Y-m-d'),
            'user' => $user,
            'vouchers' => $vouchers,
        ]);
    }

    public function showPaymentMomo()
    {
        $total = session('total');
        return view('page.payment_momo', compact('total'));
    }

    public function saveClientInfo(Request $request)
    {
        // Lấy dữ liệu từ form
        $name = $request->input('name');
        $phone = $request->input('phone');
        $address = $request->input('address');

        // Lưu vào session
        session(['name' => $name]);
        session(['phone' => $phone]);
        session(['address' => $address]);

        \Log::info('Client Information Saved:', [
            'name' => session('name'),
            'phone' => session('phone'),
            'address' => session('address'),
        ]);

        // Trả về JSON response với thông báo thành công
        return response()->json(['success' => 'Save Infomation success! ']);
    }
    public function applyVoucher(Request $request)
    {
    $newTotal =  $request->total;
    session(['total' => $newTotal]);
    session(['voucher' => $request->voucher_id]);
    $voucher = Voucher::find($request->voucher_id); // Lấy voucher từ DB
    if ($voucher) {
        return response()->json(['success' => 'Apply voucher success!']);

    }
    return response()->json(['error' => 'Invalid voucher'], 400);
    }

    public function cashOnDelivery(Request $request)
    {
        // Lấy ID người dùng hiện tại
        $userId = Auth::id();
    
        // Lấy danh sách sản phẩm và thông tin từ session
        $sessionProducts = session('products', []);
        $total = session('total', 0);
        $name = session('name');
        $phone = session('phone');
        $address = session('address');
        $voucher = session('voucher');
    
        // Kiểm tra các điều kiện cơ bản
        if (empty($sessionProducts) || $total <= 0) {
            return back()->withErrors(['message' => 'Không có sản phẩm nào để thanh toán.']);
        }
    
        if (!$name || !$phone || !$address) {
            return redirect()->back()->withErrors(['message' => 'Vui lòng cung cấp đầy đủ thông tin!']);
        }
    
        try {
            // Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
            DB::beginTransaction();
    
            // Tạo hóa đơn
            $invoice = Invoice::create([
                'user_id' => $userId,
                'voucher_id' => $voucher,
                'orderdate' => now(),
                'method' => 'Momo',
                'note' => $request->input('note', ''),
                'total_price' => $total,
                'actual_price' => $total,
                'iv_receiver' => $name,
                'iv_address' => $address,
                'iv_phone' => $phone,
                'iv_status' => 'Pending',
            ]);
    
            // Lưu chi tiết hóa đơn
            foreach ($sessionProducts as $product) {
                if (isset($product['product_id'], $product['quantity'], $product['price'])) {
                    InvoiceDetails::create([
                        'invoice_id' => $invoice->iv_id,
                        'product_id' => $product['product_id'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                    ]);
                } else {
                    \Log::warning("Sản phẩm không đầy đủ thông tin: ", $product);
                }
            }
    
            // Xóa thông tin giỏ hàng sau khi đặt hàng thành công
            session()->forget(['products', 'total', 'name', 'phone', 'address', 'voucher']);
    
            // Commit transaction
            DB::commit();
    
            // Thông báo thành công và chuyển hướng
            \Log::info("Đặt hàng thành công: Hóa đơn #" . $invoice->iv_id);
            return response()->json([
                'success' => true,
                'redirect_url' => route('paymentSuccess', ['id' => $invoice->iv_id])
            ]);
        } catch (\Exception $e) {
            // Rollback nếu có lỗi
            DB::rollBack();
    
            \Log::error("Lỗi khi tạo hóa đơn: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau.'
            ]);
        }
    }
    


}
