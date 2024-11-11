<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.account');
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
}
