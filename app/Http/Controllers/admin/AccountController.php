<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AccountController extends Controller
{
    public function showAccountPage(){
        return view ('admin.accounts.accounts');
    }
}
