<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        $products = DB::table('tbl_product')->get();
        return view('admin.deals.add-deal')->with('products', $products);;
    }
    public function saveDeal(Request $request)
    {
        $product_names = $request->input('product_name', []);
        $get_image = $request->file('deal_image');

        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/image', $new_image);
        } else {
            $new_image = '';
        }

        $data = array();
        $data['deal_name'] = $request->deal_name;
        $data['deal_discount'] = $request->deal_discount;
        $data['deal_desc'] = $request->deal_desc;
        $data['deal_image'] = $new_image;

        $deal_id = DB::table('tbl_deal')->insertGetId($data);

        foreach ($product_names as $product_name) {
            $product = DB::table('tbl_product')
                ->where('product_name', $product_name)
                ->first();

            if ($product) {
                if (!$product->original_price) {
                    DB::table('tbl_product')
                        ->where('product_name', $product_name)
                        ->update(['original_price' => $product->product_price]);
                }

                DB::table('tbl_product')
                    ->where('product_name', $product_name)
                    ->update([
                        'deal_id' => $deal_id,
                        'product_price' => DB::raw('original_price * (1 - ' . $request->deal_discount . ')'),
                    ]);
            }
        }
        Session::put('message', 'Create successfully.');
        return Redirect::to('admin/deals/create');
    }
    public function deleteDeal($deal_id)
    {
        try {
            $deal = DB::table('tbl_deal')->where('deal_id', $deal_id)->first();

            if ($deal) {
                $products = DB::table('tbl_product')->where('deal_id', $deal_id)->get();

                foreach ($products as $product) {
                    if ($product && $product->original_price) {
                        DB::table('tbl_product')
                            ->where('product_name', $product->product_name)
                            ->update(['product_price' => $product->original_price]);

                        DB::table('tbl_product')
                            ->where('product_name', $product->product_name)
                            ->update(['original_price' => null]);
                    }
                }

                DB::table('tbl_deal')->where('deal_id', $deal_id)->delete();

                session()->flash('success', 'Deal deleted and product prices restored successfully.');
            } else {
                session()->flash('error', 'Deal not found.');
            }

            return Redirect::to('admin/deals');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete the deal: ' . $e->getMessage());
            return Redirect::to('admin/deals');
        }
    }
}
