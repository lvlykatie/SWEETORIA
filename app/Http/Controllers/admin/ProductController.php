<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function showProductPage(){
        return view ('admin.products.products');
    }
    public function addProductPage(){
        return view ('admin.products.add-product');
    }
    public function saveProduct(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['category_name'] = $request->category;
        $data['product_sku'] = $request->product_sku;
        $data['product_desc'] = $request->product_desc;
        $data['product_image'] = $request->product_image;

        DB::table('tbl_product')->insert($data);
        Session::put('message','Successfully create new product');
        return Redirect::to('add-product');
    }
}
