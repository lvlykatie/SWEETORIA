<?php

namespace App\Http\Controllers\manager;

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
        return view('manager.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
    }
    public function deleteVoucher($voucher_id)
    {
        DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('manager/vouchers');
    }
    public function addVoucherPage()
    {
        return view('manager.vouchers.add-voucher');
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
        return Redirect::to('manager/vouchers/create');
    }
    public function editVoucher($voucher_id)
    {
        $edit_voucher = DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->get();
        $manager_voucher = view('manager.vouchers.edit-voucher')->with('edit_voucher', $edit_voucher);
        return view('manager.manager-layout')->with('manager.vouchers.edit-voucher', @$manager_voucher);
    }
    public function updateVoucher(Request $request, $voucher_id)
    {
        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['max_usage'] = $request->max_usage;
        $data['startdate'] = $request->startdate;
        $data['enddate'] = $request->enddate;

        $check = DB::table('tbl_voucher')->where('voucher_id', $voucher_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Update successfully.');
        } else Session::put('message', 'Failed to update.');
        return Redirect::to("manager/vouchers/edit/$voucher_id");
    }

    public function search(Request $request)
    {
        
        // Kiểm tra nếu không có query search
        if (!$request->has('query')) {
            $all_vouchers = DB::table('tbl_voucher')->get();
            return view('manager.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
        }

        // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm
        $query = $request->query('query');
        $all_vouchers= DB::table('tbl_voucher')
            ->where('voucher_name', 'LIKE', "%$query%")
            ->get();

            return view('manager.vouchers.vouchers')->with('all_vouchers', $all_vouchers);
    }
}
