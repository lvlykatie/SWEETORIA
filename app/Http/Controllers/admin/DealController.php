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
        $all_products = DB::table('tbl_product')->get();
        return view('admin.deals.add-deal')->with('all_products', $all_products);;
    }
    public function saveDeal(Request $request)
    {
        $product_names = $request->input('product_name', []);
        $get_image = $request->file('deal_image');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/image', $new_image);
        } else {
            $new_image = ''; // If no image is uploaded
        }


        foreach ($product_names as $product_name) {
            $data = array();
            $data['deal_name'] = $request->deal_name;
            $data['deal_desc'] = $request->deal_desc;
            $data['deal_price'] = $request->deal_price;
            $data['product_name'] = $product_name;
            $data['deal_image'] = $new_image;
            // Insert the deal into the database
            $deal_id = DB::table('tbl_deal')->insert($data);
            if ($deal_id) {
                // Check if the product exists before updating
                $product = DB::table('tbl_product')
                    ->where('product_name', $product_name)
                    ->first();

                if ($product) {
                    // Store the original price if not already stored
                    if (!$product->original_price) {
                        DB::table('tbl_product')
                            ->where('product_name', $product_name)
                            ->update(['original_price' => $product->product_price]);
                    }

                    // Update the product price based on the discount logic (1 - deal_price)
                    DB::table('tbl_product')
                        ->where('product_name', $product_name)
                        ->update(['product_price' => DB::raw('product_price * (1 - ' . $request->deal_price . ')')]);

                    Session::put('message', 'Deal created and product price updated successfully.');
                } else {
                    Session::put('message', 'Product not found. Deal created but price update failed.');
                }
            } else {
                Session::put('message', 'Deal creation failed.');
            }
        }



        return Redirect::to('admin/deals/create');
    }
    public function deleteDeal($deal_id)
    {
        // Find the deal to be deleted
        $deal = DB::table('tbl_deal')->where('deal_id', $deal_id)->first();

        if ($deal) {
            // Find the associated product
            $product = DB::table('tbl_product')
                ->where('product_name', $deal->product_name)
                ->first();

            if ($product && $product->original_price) {
                // Restore the original price of the product
                DB::table('tbl_product')
                    ->where('product_name', $deal->product_name)
                    ->update(['product_price' => $product->original_price]);

                // Optionally, set original_price to NULL again
                DB::table('tbl_product')
                    ->where('product_name', $deal->product_name)
                    ->update(['original_price' => null]);
            }

            // Delete the deal
            DB::table('tbl_deal')->where('deal_id', $deal_id)->delete();

            Session::put('message', 'Deal deleted and product price restored successfully.');
        } else {
            Session::put('message', 'Deal not found.');
        }

        return Redirect::to('admin/deals');
    }
}
