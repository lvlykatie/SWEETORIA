<?php
namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Requests;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();


class UserAuthController extends Controller
{
    public function login(Request $request)
    {
    $user_email = $request->userEmail; //->userEmail là name 
    $user_password = md5($request->password);

    $result = DB::table('tb_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();
    if ($result) {
        if ($result->role == 'admin') {
            Session::put('user_name', $result->user_name); //'user_name' là 1 chuỗi đơn giản bạn đặt tên cho khóa trong session
            Session::put('user_email', $result->user_email);
            return Redirect::to('/forgetpass');   // nhớ sửa lại vào trang admin 
        } else {
            // client
            Session::put('user_name', $result->user_name);
            Session::put('user_email', $result->user_email);
            return Redirect::to('/signup'); // nhớ sửa lại vào homepage
        }
    } else {
        Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
        return Redirect::to('/signin');
        }
    }

    public function logout()
    {
    Session::put('user_name', null);
    return Redirect::to('/signin');
    }

    public function checkEmail(Request $request)
    {
        // Lấy email từ request
        $email = $request->input('email');

        // Kiểm tra email có tồn tại trong bảng tb_user không
        $exists = DB::table('tb_user')->where('user_email', $email)->exists();

        // Trả về kết quả dưới dạng JSON
        return response()->json(['exists' => $exists]);
    }
}


