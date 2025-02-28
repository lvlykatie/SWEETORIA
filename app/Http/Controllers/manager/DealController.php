<?php

namespace App\Http\Controllers\manager;

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

        $products_by_deal = DB::table('tbl_product')
            ->select('product_name', 'product_price', 'deal_id')
            ->whereNotNull('deal_id') // Only get products that are associated with deals
            ->get()
            ->groupBy('deal_id');

        return view('manager.deals.deals', compact('all_deals', 'products_by_deal'));
    }

    public function addDealPage()
    {
        $products = DB::table('tbl_product')->get();
        return view('manager.deals.add-deal')->with('products', $products);
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
        return Redirect::to('manager/deals/create');
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

            return Redirect::to('manager/deals');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete the deal: ' . $e->getMessage());
            return Redirect::to('manager/deals');
        }
    }
    public function editDeal($deal_id)
    {
        $products = DB::table('tbl_product')->get();
        $edit_deal = DB::table('tbl_deal')->where('deal_id', $deal_id)->get();
        $manager_deal = view('manager.deals.edit-deal')->with(['edit_deal' => $edit_deal, 'products' => $products]);
        return view('manager.manager-layout')->with('manager.deals.edit-deal', @$manager_deal);
    }
    public function updateDeal(Request $request, $deal_id)
    {
        $product_names = $request->input('product_name', []);
        $get_image = $request->file('deal_image');

        // Retrieve existing deal
        $existingDeal = DB::table('tbl_deal')->where('deal_id', $deal_id)->first();
        if (!$existingDeal) {
            Session::put('message', 'Deal not found.');
            return Redirect::to('manager/deals');
        }

        // Handle image upload
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/image', $new_image);
        } else {
            $new_image = $existingDeal->deal_image; // Keep current image if none is uploaded
        }

        // Prepare data for updating the deal
        $data = [];
        $data['deal_name'] = $request->deal_name;
        $data['deal_discount'] = $request->deal_discount;
        $data['deal_desc'] = $request->deal_desc;
        $data['deal_image'] = $new_image;

        // Update deal record
        DB::table('tbl_deal')->where('deal_id', $deal_id)->update($data);

        // Reset deal_id and product_price for previous associated products
        DB::table('tbl_product')
            ->where('deal_id', $deal_id)
            ->update(['deal_id' => null, 'product_price' => DB::raw('original_price')]);

        // Update products with new deal_id and discounted price
        foreach ($product_names as $product_name) {
            $product = DB::table('tbl_product')
                ->where('product_name', $product_name)
                ->first();

            if ($product) {
                // Set original price if not already set
                if (!$product->original_price) {
                    DB::table('tbl_product')
                        ->where('product_name', $product_name)
                        ->update(['original_price' => $product->product_price]);
                }

                // Update product with new deal_id and discounted price
                DB::table('tbl_product')
                    ->where('product_name', $product_name)
                    ->update([
                        'deal_id' => $deal_id,
                        'product_price' => DB::raw('original_price * (1 - ' . $request->deal_discount . ')'),
                    ]);
            }
        }

        Session::put('message', 'Update successfully.');
        return Redirect::to("manager/deals/edit/$deal_id");
    }

    public function search(Request $request)
    {

        // Kiểm tra nếu không có query search
        if (!$request->has('query')) {
            $all_deals = DB::table('tbl_deal')->get();

            $products_by_deal = DB::table('tbl_product')
                ->select('product_name', 'product_price', 'deal_id')
                ->whereNotNull('deal_id') // Only get products that are associated with deals
                ->get()
                ->groupBy('deal_id');

            return view('manager.deals.deals', compact('all_deals', 'products_by_deal'));
        }

        // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm
        $query = $request->query('query');
        $all_deals = DB::table('tbl_deal')
            ->where('deal_name', 'LIKE', "%$query%")
            ->get();

        $products_by_deal = DB::table('tbl_product')
            ->select('product_name', 'product_price', 'deal_id')
            ->whereNotNull('deal_id') // Only get products that are associated with deals
            ->get()
            ->groupBy('deal_id');

        return view('manager.deals.deals', compact('all_deals', 'products_by_deal'));
    }
}
