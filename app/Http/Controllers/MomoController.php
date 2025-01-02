<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\InvoiceDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class MomoController extends Controller
{
    //
    public function createPayment(Request $request)
    {
        $orderId = rand(0, 9999); // Mã đơn hàng duy nhất
        $userId = Auth::id(); // Lấy ID người dùng hiện tại
        $sessionProducts = session('products', []); // Lấy danh sách sản phẩm từ session
        $total = session('total', 0); // Tổng tiền từ session

        if (empty($sessionProducts) || $total <= 0) {
            return back()->withErrors(['message' => 'Không có sản phẩm nào để thanh toán.']);
        }

        $name = session('name');
        $phone = session('phone');
        $address = session('address');
        $voucher = session('voucher');

        if (!$name || !$phone || !$address) {
            return redirect()->back()->withErrors(['message' => 'Vui lòng cung cấp đầy đủ thông tin!']);
        }

        // Tạo hóa đơn
        $invoice = Invoice::create([
            'user_id' => $userId,
            'voucher_id' => $voucher,// Nếu có mã giảm giá, cập nhật ở đây
            'orderdate' => now(),
            'method' => 'Momo', // Phương thức thanh toán
            'note' => $request->input('note', ''), // Ghi chú từ form (nếu có)
            'total_price' => $total,
            'actual_price' => $total, // Nếu có giảm giá, cập nhật giá thực tế
            'iv_receiver' => $name, // Lấy tên từ session
            'iv_address' => $address, // Địa chỉ từ session
            'iv_phone' => $phone, // Số điện thoại từ session
            'iv_status' => 'Pending', // Trạng thái mặc định
        ]);

        foreach ($sessionProducts as $product) {
            // Kiểm tra xem 'product_id' có tồn tại trong mảng không
            if (isset($product['product_id']) && isset($product['quantity']) && isset($product['price'])) {
                InvoiceDetails::create([
                    'invoice_id' => $invoice->iv_id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                    'price' => $product['price'],
                ]);
            } else {
                // Log hoặc xử lý lỗi nếu không có 'product_id', 'quantity' hoặc 'price'
                \Log::warning("Sản phẩm không đầy đủ thông tin: ", $product);

            }
        }
        // Gọi API Momo
        $orderInfo = "Thanh toán đơn hàng #" . $orderId;
        $amount = $total;

        $endpoint = env('MOMO_ENDPOINT');
        $partnerCode = env('MOMO_PARTNER_CODE');
        $accessKey = env('MOMO_ACCESS_KEY');
        $secretKey = env('MOMO_SECRET_KEY');
        $redirectUrl = env('MOMO_REDIRECT_URL');
        $ipnUrl = env('MOMO_IPN_URL');
        $requestId = $orderId;
        $requestType = "payWithATM"; // Thay đổi sang Momo ATM
        $extraData = "";

        // Tạo raw hash
        $rawHash = "accessKey={$accessKey}&amount={$amount}&extraData={$extraData}&ipnUrl={$ipnUrl}&orderId={$orderId}&orderInfo={$orderInfo}&partnerCode={$partnerCode}&redirectUrl={$redirectUrl}&requestId={$requestId}&requestType={$requestType}";
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        \Log::info("Raw hash: " . $rawHash);
        \Log::info("Signature: " . $signature);

        $response = Http::post($endpoint, [
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature,
        ]);

        $result = $response->json();

        \Log::info("Momo API Response:", $response->json()); // Log phản hồi

        if (isset($result['payUrl'])) {
            return redirect()->to($result['payUrl']); // Điều hướng đến URL thanh toán của Momo
        }

        return response()->json($result); // Trả về lỗi nếu có
    }

    public function paymentNotify(Request $request)
    {
        \Log::info('IPN received: ' . json_encode($request->all()));

        $data = $request->all();
        $partnerCode = $data['partnerCode'];
        $orderId = $data['orderId'];
        $requestId = $data['requestId'];
        $amount = $data['amount'];
        $orderInfo = $data['orderInfo'];
        $resultCode = $data['resultCode'];
        $message = $data['message'];
        $responseTime = $data['responseTime'];
        $extraData = $data['extraData'];
        $signature = $data['signature'];

        // Xác minh chữ ký
        $rawHash = "amount={$amount}&extraData={$extraData}&message={$message}&orderId={$orderId}&orderInfo={$orderInfo}&partnerCode={$partnerCode}&requestId={$requestId}&responseTime={$responseTime}&resultCode={$resultCode}";
        $expectedSignature = hash_hmac("sha256", $rawHash, env('MOMO_SECRET_KEY'));

        if ($signature === $expectedSignature) {
            if ($resultCode == '0') {
                \Log::info('Thanh toán thành công cho đơn hàng: ' . $orderId);
            } else {
                \Log::info('Thanh toán thất bại: ' . $message);
            }

            return response()->json(['message' => 'IPN processed successfully']);
        }

        return response()->json(['message' => 'Invalid signature'], 400);
    }

    public function paymentSuccess(Request $request)
    {
        \Log::info('Payment success: ' . json_encode($request->all()));

        $resultCode = $request->input('resultCode'); // Lấy mã kết quả thanh toán
        if ($resultCode == '0') {
            // Thanh toán thành công
            return view('page.thanks', ['message' => 'Your order has been placed successfully!']);
        } else {
            // Thanh toán thất bại hoặc bị hủy
            return view('page.thanks', ['message' => 'Your order has been placed successfully!']);
        }
    }

}
