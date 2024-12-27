<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Container\Attributes\Log;
use App\Models\Cart;                
use App\Models\CartDetails;          
use App\Models\Product; 
use Illuminate\Support\Facades\Session;

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

        return view('page.payment', [
            'products' => $productDetails,
            'total' => $total,
            'date' => now()->format('Y-m-d'),
            'user' => $user
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
    

}
