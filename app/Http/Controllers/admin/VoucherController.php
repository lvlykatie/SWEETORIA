<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class VoucherController extends Controller
{
    public function showVoucherPage()
    {
        $all_vouchers = DB::table('tbl_voucher')->get();
        return view('admin.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
    }
    public function deleteVoucher($voucher_id)
    {
        DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('admin/vouchers');
    }
    public function addVoucherPage()
    {
        return view('admin.vouchers.add-voucher');
    }
    public function saveVoucher(Request $request)
    {
        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['discount_value'] = $request->discount_value;
        $data['max_usage'] = $request->max_usage;
        $data['minimum_order_value'] = $request->minimum_order_value;
        $data['startdate'] = $request->startdate;
        $data['enddate'] = $request->enddate;

        DB::table('tbl_voucher')->insert($data);
        Session::put('message', 'Create successfully.');
        return Redirect::to('admin/vouchers/create');
    }
    public function editVoucher($voucher_id)
    {
        $edit_voucher = DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->get();
        $manager_voucher = view('admin.vouchers.edit-voucher')->with('edit_voucher', $edit_voucher);
        return view('admin.layout')->with('admin.vouchers.edit-voucher', @$manager_voucher);
    }
    public function updateVoucher(Request $request, $voucher_id)
    {
        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['discount_value'] = $request->discount_value;
        $data['max_usage'] = $request->max_usage;
        $data['minimum_order_value'] = $request->minimum_order_value;
        $data['startdate'] = $request->startdate;
        $data['enddate'] = $request->enddate;

        $check = DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Update successfully.');
        } else Session::put('message', 'Failed to update.');
        return Redirect::to("admin/vouchers/edit/$voucher_id");
    }

    public function search(Request $request)
    {
        
        // Kiểm tra nếu không có query search
        if (!$request->has('query')) {
            $all_vouchers = DB::table('tbl_voucher')->get();
            return view('admin.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
        }

        // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm
        $query = $request->query('query');
        $all_vouchers= DB::table('tbl_voucher')
            ->where('voucher_name', 'LIKE', "%$query%")
            ->get();

            return view('admin.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
    }
}
