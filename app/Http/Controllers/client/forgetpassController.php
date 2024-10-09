<?php 

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Mail\ContactEmail;
use Mail;

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
            // Nếu email không tồn tại
            return back()->withErrors(['email_not_found' => 'Email không tồn tại, vui lòng thử lại.']);
        } else {
            // Nếu email tồn tại, tạo mã OTP và thời gian hết hạn
            $otp = rand(100000, 999999); // Tạo mã OTP ngẫu nhiên
            $expiry = Carbon::now()->addMinutes(5); // Thời gian hết hạn là 5 phút

            // Cập nhật OTP và thời gian hết hạn vào cơ sở dữ liệu
            DB::table('tb_user')
                ->where('user_email', $email)
                ->update(['otp' => $otp, 'otp_expiry' => $expiry]);


            Mail::to($email)->send(new ContactEmail($otp));



            // Chuyển hướng sang trang nhập OTP
            return redirect('/otp')->with('email', $email);
        }
    }

    public function verifyOTP(Request $request)
    {
        // Lấy dữ liệu từ form
        $email = $request->input('userEmail');
        $otp = $request->input('otp');
    
        // Kiểm tra OTP và thời gian hết hạn
        $user = DB::table('tb_user')
                    ->where('user_email', $email)
                    ->first();
    
        if ($user && $user->otp === $otp && Carbon::now()->lessThanOrEqualTo($user->otp_expiry)) {
            // Xác thực thành công
            return redirect('/resetpass')->with('email', $email);
        } else {
            // Xác thực thất bại
            return back()->withErrors(['otp_invalid' => 'Mã OTP không hợp lệ hoặc đã hết hạn.']);
        }
    }


    public function resetPassword(Request $request)
    {
        $email = $request->input('userEmail');
        $newPassword = $request->input('newPassword');
        $confirmPassword = $request->input('confirmPassword');



        // Kiểm tra mật khẩu mới và mật khẩu confirm khớp nhau
        if ($newPassword !== $confirmPassword) {
            return back()->withErrors(['password_mismatch' => 'Mật khẩu mới và xác nhận mật khẩu không khớp.']);
        }

        // Mã hóa mật khẩu mới bằng Hash::make
        $hashedPassword = Hash::make($newPassword);

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        DB::table('tb_user')
            ->where('user_email', $email)
            ->update([
                'user_password' => $hashedPassword, // Sử dụng Hash::make để băm mật khẩu mới
                'updated_at' => Carbon::now(),
            ]);


        // Chuyển hướng về trang chủ hoặc thông báo reset mật khẩu thành công
        return redirect('/signin')->with('success', 'Mật khẩu của bạn đã được đặt lại thành công.');
    }
    


}
