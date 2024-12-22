<?php

namespace App\Http\Controllers\seller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function showProductPage()
    {
        $all_products = DB::table('tbl_product')->get();
        return view('seller.products.products')->with('all_products', $all_products);
    }

       public function search(Request $request)
{
    // Kiểm tra nếu không có query search
    if (!$request->has('query')) {
        $all_products = DB::table('tbl_product')->get();
        return view('seller.products.products')->with('all_products', $all_products);
    }

    // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm
    $query = $request->query('query');
    $all_products = DB::table('tbl_product')
        ->where('product_name', 'LIKE', "%$query%")
        ->orWhere('category_name', 'LIKE', "%$query%")
        ->orWhere('product_sku', 'LIKE', "%$query%")
        ->get();

    return view('seller.products.products')->with('all_products', $all_products);
}


}
