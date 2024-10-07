<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
 
class ProductController extends Controller
{
    public function showProductPage()
    {
        $all_products = DB::table('tbl_product')->get();
        return view('admin.products.products')->with('all_products', $all_products);
    }
    public function addProductPage()
    {
        return view('admin.products.add-product');
    }
    public function saveProduct(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['category_name'] = $request->category;
        $data['product_sku'] = $request->product_sku;
        $data['product_desc'] = $request->product_desc;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/image', $new_image);
            $data['product_image'] = ($new_image);
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Create successfully.');
            return Redirect::to('admin/products/create');
        } else {
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Create successfully.');
            return Redirect::to('admin/products/create');
        }
    }
    public function deleteProduct($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('admin/products');
    }
}
