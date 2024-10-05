<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

session_start();

class DealController extends Controller
{
    public function showDealPage()
    {
        $all_deals = DB::table('tbl_deal')->get();
        return view('admin.deals.deals')->with('all_deals', $all_deals);
    }
    public function addDealPage()
    {
        return view('admin.deals.add-deal');
    }
    public function saveDeal(Request $request)
    {
        $data = array();
        $data['deal_name'] = $request->deal_name;
        $data['deal_desc'] = $request->deal_desc;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;

        $get_image = $request->file('deal_image');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/image', $new_image);
            $data['deal_image'] = ($new_image);
            DB::table('tbl_deal')->insert($data);
            Session::put('message', 'Create successfully.');
            return Redirect::to('admin/deals/create');
        } else {
            $data['product_image'] = '';
            DB::table('tbl_deal')->insert($data);
            Session::put('message', 'Create successfully.');
            return Redirect::to('admin/deals/create');
        }
//Tạo tbl chứa deal id và product id, xem hướng dẫn típ di clm fck
    }
}
