<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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

        // Thêm join với bảng deal để lấy thông tin giảm giá
        $query->leftJoin('tbl_deal', 'tbl_product.deal_id', '=', 'tbl_deal.deal_id')
            ->select('tbl_product.*', 'tbl_deal.deal_discount', 'tbl_deal.deal_id');

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
        $feedbacks = DB::table('tbl_feedback')
            ->join('tb_user', 'tbl_feedback.user_id', '=', 'tb_user.user_id') // Join với bảng tbl_user
            ->select('tbl_feedback.*', 'tb_user.user_name as user_name') // Chọn thông tin cần thiết
            ->where('tbl_feedback.product_id', $id)
            ->get();
        return view('page.detail', compact('product', 'related_product', 'feedbacks'));
    }



    public function hotdeals()
    {
        return view('page.hotdeal');
    }
    public function sendFeedBack(Request $request)
    {
        try {
            // Kiểm tra dữ liệu form
            $request->validate([
                'feedback_content' => 'required|string|max:1000',
                'rating' => 'required|integer|min:1|max:5',
                'product_id' => 'required|exists:tbl_product,product_id', // Kiểm tra sản phẩm có tồn tại
                'feedback_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Kiểm tra file ảnh
            ]);

            // Xử lý ảnh upload (nếu có)
            $imagePath = null;
            if ($request->hasFile('feedback_image')) {
                $image = $request->file('feedback_image');
                $imagePath = $image->store('feedback_images', 'public'); // Lưu ảnh vào thư mục feedback_images trong storage/app/public
            }

            // Lưu feedback vào cơ sở dữ liệu
            Feedback::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'comment' => $request->feedback_content,
                'rate' => $request->rating,
                'image' => $imagePath, // Lưu đường dẫn ảnh vào cơ sở dữ liệu
                'created_at' => now(),
            ]);

            return back()->with('success', 'Feedback đã được gửi thành công!');
        } catch (\Exception $e) {
            dd($e); // In ra toàn bộ thông tin lỗi để debug
        }
    }
}
