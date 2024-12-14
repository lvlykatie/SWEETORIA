<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index(Request $request)
{
    // Lấy tham số 'filter' và 'sort' từ query string
    $filter = $request->input('filter'); // 'baking-ingredients,baking-tools'
    $sort = $request->input('sort'); // 'low-to-high'

    // Truy vấn tất cả sản phẩm từ cơ sở dữ liệu
    $query = Product::query();

    // Lọc theo danh mục nếu có
    if ($filter) {
        // Tách chuỗi các danh mục từ tham số filter thành mảng
        $filters = explode('.', $filter);

        // Loại bỏ dấu gạch nối và chuyển thành chữ thường để so sánh
        $filters = array_map(function ($filter) {
            return strtolower(str_replace('-', ' ', $filter)); // Thay dấu gạch nối thành khoảng trắng và chuyển thành chữ thường
        }, $filters);

        // Lọc các sản phẩm theo danh mục
        $query->whereIn('category_name', $filters);
    }

    // Sắp xếp theo giá
    if ($sort === 'low-to-high') {
        $query->orderBy('product_price', 'asc');
    } elseif ($sort === 'high-to-low') {
        $query->orderBy('product_price', 'desc');
    }

    // Phân trang sản phẩm (10 sản phẩm mỗi trang)
    $products = $query->paginate(10)->appends($request->only(['filter', 'sort']));

    // Trả về view với các sản phẩm đã được lọc và sắp xếp
    return view('page.product', compact('products'));
}


public function search(Request $request)
{
    $query = $request->input('query');
    $filter = $request->input('filter');
    $sort = $request->input('sort');

    // Khởi tạo query
    $productQuery = Product::query();

    // Tìm kiếm sản phẩm
    if ($query) {
        $productQuery->where('product_name', 'like', '%' . $query . '%')
                     ->orWhere('product_desc', 'like', '%' . $query . '%');
    }

    // Lọc danh mục (nếu có)
    if ($filter) {
        $filters = explode('.', $filter);
        $productQuery->whereIn('category_name', $filters);
    }

    // Sắp xếp (nếu có)
    if ($sort === 'low-to-high') {
        $productQuery->orderBy('product_price', 'asc');
    } elseif ($sort === 'high-to-low') {
        $productQuery->orderBy('product_price', 'desc');
    }


    // Lấy kết quả
    $products = $productQuery->paginate(10);

    // Trả về view
    return view('page.product', compact('products', 'query', 'filter', 'sort'));

}



public function detail($id)
{
    // Fetch a single product
    $product = DB::table('tbl_product')
        ->where('product_id', $id)
        ->first(); // Fetch the first record as a single object, not a collection

    if (!$product) {
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    }

    // Get related products (up to 3) based on category_name
    $related_product = DB::table('tbl_product')
        ->where('category_name', $product->category_name) // Using the category from the single product
        ->where('product_id', '!=', $id)
        ->take(3) // Limit to 3 related products
        ->get(); // Return a collection of related products

    return view('page.detail', compact('product', 'related_product'));
}



public function hotdeals()
{
    return view('page.hotdeal');
}

}
