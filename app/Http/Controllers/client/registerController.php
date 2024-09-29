<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Thêm dòng này
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
    $request->validate([
        'username' => 'required|string|max:255',
        'userEmail' => 'required|email|unique:tb_user,user_email', // Kiểm tra email duy nhất
        'phonenum' => 'required|string|max:15', // Kiểm tra số điện thoại
        'password' => 'required|string|min:4|confirmed', // Xác thực mật khẩu và xác nhận mật khẩu
        
    ]);

    // Tạo mảng dữ liệu
    $data = array();
    $data['user_email'] = $request->userEmail; 
    $data['user_password'] = Hash::make($request->password); // Mã hóa mật khẩu bằng Bcrypt
    $data['user_name'] = $request->username; 
    $data['user_phone'] = $request->phonenum; 
    $data['user_address'] = null; 
    $data['role'] = 'customer'; // Gán vai trò mặc định cho người dùng

    // Thêm người dùng vào cơ sở dữ liệu
    DB::table('tb_user')->insert($data);

    // Lưu thông báo thành công vào session
    Session::put('success_msg', "Tạo tài khoản thành công!");

    // Chuyển hướng về trang đăng nhập
    return redirect('/signin');
    }
}
