<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function signIn(Request $request)
    {
        // Lấy dữ liệu từ form đăng nhập
        $email = $request->input('userEmail');
        $password = $request->input('password');

        // Kiểm tra email và mật khẩu trong cơ sở dữ liệu
        $user = DB::table('tb_user')
                    ->where('user_email', $email)
                    ->first();

        if ($user && Hash::check($password, $user->user_password)) {
            // Kiểm tra vai trò (role) của người dùng
            if ($user->role == 'admin') {
                // Chuyển hướng tới trang admin
                return redirect('/admin/dashboard');
            } elseif ($user->role == 'customer') {
                // Chuyển hướng tới trang customer
                return redirect('/signup');
            }
        } else {
            // Nếu không khớp, quay lại trang đăng nhập với thông báo lỗi
            return back()->withErrors(['login_failed' => 'Email hoặc mật khẩu không đúng']);
        }
    }
}
