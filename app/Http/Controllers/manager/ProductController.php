<?php

namespace App\Http\Controllers\manager;


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
        return view('manager.products.products')->with('all_products', $all_products);
    }

    public function addProductPage()
    {
        return view('manager.products.add-product');
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
            return Redirect::to('manager/products/create');
        } else {
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Create successfully.');
            return Redirect::to('manager/products/create');
        }
    }
    public function deleteProduct($product_id)
    {
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Delete successfully');
        return Redirect::to('manager/products');
    }
    public function editProduct($product_id)
    {
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('manager.products.edit-product')->with('edit_product', $edit_product);
        return view('manager.layout')->with('manager.products.edit-product', @$manager_product);
    }
    public function updateProduct(Request $request, $product_id)
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
            $check = DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Update successfully.');
            } else Session::put('message', 'Failed to update.');
            return Redirect::to("manager/products/edit/$product_id");
        } else {
            $check = DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Update successfully.');
            } else Session::put('message', 'Failed to update.');
            return Redirect::to("manager/products/edit/$product_id");
        }
    }

       public function search(Request $request)
{
    // Kiểm tra nếu không có query search
    if (!$request->has('query')) {
        $all_products = DB::table('tbl_product')->get();
        return view('manager.products.products')->with('all_products', $all_products);
    }

    // Nếu có từ khóa tìm kiếm, thực hiện tìm kiếm
    $query = $request->query('query');
    $all_products = DB::table('tbl_product')
        ->where('product_name', 'LIKE', "%$query%")
        ->orWhere('category_name', 'LIKE', "%$query%")
        ->orWhere('product_sku', 'LIKE', "%$query%")
        ->get();

    return view('manager.products.products')->with('all_products', $all_products);
}


}
