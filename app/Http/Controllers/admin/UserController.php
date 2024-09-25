<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class UserController extends Controller
{
    public function showUserPage(){
        return view ('admin.components.users');
    }
}
