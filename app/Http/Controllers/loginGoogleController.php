<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Log;

class loginGoogleController extends Controller
{
    // Điều hướng người dùng đến trang đăng nhập Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

// Xử lý callback từ Google
public function handleGoogleCallback()
{
    try {
        // Lấy thông tin người dùng từ Google
        $googleUser = Socialite::driver('google')->user();

        // Kiểm tra xem người dùng đã tồn tại trong hệ thống chưa
        $user = User::where('user_email', $googleUser->getEmail())->first();

        if ($user) {
            // Nếu người dùng đã tồn tại, đăng nhập
            Auth::login($user);
            Log::info('User logged in:', ['user_id' => $user->id, 'email' => $user->user_email]);
        } else {
            // Nếu người dùng chưa tồn tại, tạo người dùng mới
            $newUser = User::create([
                'user_email' => $googleUser->getEmail(),
                'user_password' => Hash::make(uniqid()), // Đặt mật khẩu ngẫu nhiên
                'user_name' => $googleUser->getName(),
                'user_phone' => null,
                'user_address' => null,
                'role' => 'customer',
                'google_id' => $googleUser->getId(),
            ]);

            Auth::login($newUser);
            Log::info('New user created and logged in:', ['user_id' => $newUser->id, 'email' => $newUser->user_email]);
        }

        // Điều hướng đến trang chủ
        return redirect('/'); 
    } catch (\Exception $e) {
        Log::error('Error during Google login:', ['error' => $e->getMessage()]);
        return redirect('/signin')->with('error', 'Có lỗi xảy ra khi đăng nhập Google');
    }
}


}
