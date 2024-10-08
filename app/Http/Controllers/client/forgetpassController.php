<?php 

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetPassController extends Controller
{
    public function checkEmail(Request $request)
    {
        // Lấy dữ liệu email từ form
        $email = $request->input('userEmail');

        // Kiểm tra email có tồn tại trong cơ sở dữ liệu hay không
        $user = DB::table('tb_user')
                    ->where('user_email', $email)
                    ->first();

        if (!$user) {
            // Nếu email không tồn tại, trả về trang với thông báo lỗi
            return back()->withErrors(['email_not_found' => 'Email không tồn tại, vui lòng thử lại.']);
        } else {
            // Nếu email tồn tại, tạo mã OTP và lưu vào session
            $otp = rand(100000, 999999); // Tạo mã OTP ngẫu nhiên

            // Lưu OTP và email vào session
            session(['otp' => $otp, 'email' => $email]);

            // Gửi email chứa mã OTP qua SMTP đã cấu hình với Mailjet
            Mail::raw("Mã OTP của bạn là: $otp", function ($message) use ($email) {
                // Đảm bảo rằng bạn sử dụng địa chỉ email đã xác minh
                $message->to($email)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')) // Sử dụng địa chỉ email đã xác minh
                        ->subject('Mã OTP Reset Mật Khẩu');
            });

            // Chuyển hướng sang trang nhập OTP
            return redirect('/resetpass')->with('email', $email);
        }
    } 
}
