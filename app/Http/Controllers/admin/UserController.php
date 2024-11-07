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
    public function showUserPage()
    {
        $all_users = DB::table('tb_user')->get();
        return view('admin.users.users')->with('all_users', $all_users);
    }
    public function deleteUser($user_id)
    {
        DB::table('tb_user')->where('user_id', $user_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('admin/users');
    }
    public function editUser($user_id)
    {
        $edit_user = DB::table('tb_user')->where('user_id', $user_id)->get();
        $manager_user = view('admin.users.edit-user')->with('edit_user', $edit_user);
        return view('admin.layout')->with('admin.users.edit-user', @$manager_user);
    }
    public function updateUser(Request $request, $user_id)
    {
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['role'] = $request->role;
        
        $check = DB::table('tb_user')->where('user_id', $user_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Update successfully.');
        } else Session::put('message', 'Failed to update.');
        return Redirect::to("admin/users/edit/$user_id");
        }
}
