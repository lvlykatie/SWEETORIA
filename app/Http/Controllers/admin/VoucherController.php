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
    public function showVoucherPage(){
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
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['max_usage'] = $request->max_usage;
        $data['startdate'] = $request->startdate;
        $data['enddate'] = $request->enddate;

        DB::table('tbl_voucher')->insert($data);
        Session::put('message', 'Create successfully.');
        return Redirect::to('admin/vouchers/create');
    }
}
