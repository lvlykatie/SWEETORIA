<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MomoController extends Controller
{
    //
    public function createPayment(Request $request)
    {
        $orderId = time(); // Mã đơn hàng duy nhất
        $orderInfo = "Thanh toán đơn hàng #" . $orderId;
        $total = session('total', 10000); // Tổng số tiền thanh toán, mặc định là 10,000 nếu không có
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
            return view('page.thanks', ['message' => 'Thanh toán thành công!']);
        } else {
            // Thanh toán thất bại hoặc bị hủy
            return view('page.thanks', ['message' => 'Thanh toán thất bại hoặc đã bị hủy.']);
        }
    }
   
}
