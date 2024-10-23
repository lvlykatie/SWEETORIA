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
}
