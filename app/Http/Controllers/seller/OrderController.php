<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class OrderController extends Controller
{
    public function showOrderPage()
    {
        $all_orders = DB::table('tbl_invoice')
            ->join('tb_user', 'tbl_invoice.user_id', '=', 'tb_user.user_id')
            ->select('tbl_invoice.*', 'tb_user.user_email', 'tb_user.user_id')
            ->get();

        return view('seller.orders.orders', compact('all_orders'));
    }
    public function editOrder($iv_id)
    {
        $edit_order = DB::table('tbl_invoice')->where('iv_id', $iv_id)->get();
        $manager_order = view('seller.orders.edit-order')->with('edit_order', $edit_order);
        return view('seller.seller-layout')->with('seller.orders.edit-order', @$manager_order);
    }
    public function updateOrder(Request $request, $iv_id)
    {
        $data = array();
        $data['iv_receiver'] = $request->iv_receiver;
        $data['iv_phone'] = $request->iv_phone;
        $data['iv_address'] = $request->iv_address;
        $data['iv_status'] = $request->status;

        $check = DB::table('tbl_invoice')->where('iv_id', $iv_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Update successfully.');
        } else Session::put('message', 'Failed to update.');
        return Redirect::to("seller/orders/edit/$iv_id");
    }
    public function deleteOrder($iv_id)
    {
        DB::table('tbl_invoice')->where('iv_id', $iv_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('seller/orders');
    }

    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input
        $search = $request->input('search');

        // Kiểm tra nếu từ khóa tìm kiếm không rỗng
        if ($search) {
            // Tìm kiếm trong bảng tbl_invoice và tb_user với điều kiện là email hoặc số điện thoại
            $all_orders = DB::table('tbl_invoice')
                ->join('tb_user', 'tbl_invoice.user_id', '=', 'tb_user.user_id')
                ->where('tb_user.user_email', 'like', '%' . $search . '%')
                ->orWhere('tbl_invoice.iv_phone', 'like', '%' . $search . '%')
                ->select('tbl_invoice.*', 'tb_user.user_email', 'tb_user.user_id')
                ->get();
        } else {
            // Nếu không có từ khóa tìm kiếm, lấy tất cả đơn hàng
            $all_orders = DB::table('tbl_invoice')
                ->join('tb_user', 'tbl_invoice.user_id', '=', 'tb_user.user_id')
                ->select('tbl_invoice.*', 'tb_user.user_email', 'tb_user.user_id')
                ->get();
        }

        // Trả về view với các đơn hàng tìm được
        return view('seller.orders.orders', compact('all_orders'));
    }
}
