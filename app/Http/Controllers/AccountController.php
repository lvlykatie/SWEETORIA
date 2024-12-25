<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.account' , compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('account.edituser' , compact('user'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,12',
            'address' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        $user->user_name = $request->name;
        $user->user_email = $request->email;
        $user->user_phone = $request->phone;
        $user->user_address = $request->address;
        $user->save();
        return redirect()->route('account')->with('success', 'Cập nhật thông tin thành công');
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
