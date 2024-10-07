<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class UserController extends Controller
{
    public function showUserPage(){
        $all_users = DB::table('tb_user')->get();
        return view('admin.users.users')->with('all_users', $all_users);
    }
    public function deleteUser($user_id)
    {
        DB::table('tb_user')->where('user_id', $user_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('admin/users');
    }
}
