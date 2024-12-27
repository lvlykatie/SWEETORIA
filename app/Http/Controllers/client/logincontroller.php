<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
        Auth::loginUsingId($user->user_id);
        $request->session()->put('user_name', $user->user_name);
        Log::info('Session data after login:', $request->session()->all());
        if ($user && Hash::check($password, $user->user_password)) {
            // Kiểm tra vai trò (role) của người dùng
            if ($user->role == 'Admin') {
                Session::put('admin_name', $user->user_name);
                Session::put('admin_id', $user->user_id);
                // Session::put('image', asset('public/backend/users-images/' . $user->user_image)); 
                return Redirect::to('/admin/dashboard');
            } elseif ($user->role == 'Client') {
                // Chuyển hướng tới trang homepage
                return redirect('/');
            } elseif ($user->role == 'Manager') {
                Session::put('manager_name', $user->user_name);
                Session::put('manager_id', $user->user_id);
                // Chuyển hướng tới trang manager
                return redirect('/manager/dashboard');
            } elseif ($user->role == 'Seller') {
                // Chuyển hướng tới trang seller
                Session::put('seller_name', $user->user_name);
                Session::put('seller_id', $user->user_id);
                return redirect('/seller/dashboard');
            } else {
                // Nếu không khớp, quay lại trang đăng nhập với thông báo lỗi
                return back()->withErrors(['login_failed' => 'Email hoặc mật khẩu không đúng']);
            }
        }
    }
}
