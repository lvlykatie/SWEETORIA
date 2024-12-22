<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.account' , compact('user'));
    }

    public function orders()
    {
        return view('account.orders');
    }

    public function changePassword()
    {
        return view('account.changepw');
    }
    public function policy()
    {
        return view('account.policy');
    }
    public function logout()
    {
        Auth::logout();  // Đăng xuất người dùng hiện tại

        // Xóa session nếu cần
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
