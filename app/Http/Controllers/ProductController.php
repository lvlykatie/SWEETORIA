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
        // Lấy tham số 'filter', 'sort', và 'search' từ query string
        $filters = $request->input('filters'); // 'dealnow' hoặc các giá trị khác
        $sort = $request->input('sort'); // 'low-to-high'
        $search = $request->input('search'); // Tên sản phẩm muốn tìm kiếm

        // Truy vấn tất cả sản phẩm từ cơ sở dữ liệu
        $query = Product::query();

        // Lọc theo các filter nếu có
        if ($filters) {
            // Tách chuỗi các filters từ tham số filters thành mảng
            $filters = explode('.', $filters);

            // Loại bỏ dấu gạch nối và chuyển thành chữ thường để so sánh
            $filters = array_map(function ($filter) {
                return strtolower(str_replace('-', ' ', $filter)); // Thay dấu gạch nối thành khoảng trắng và chuyển thành chữ thường
            }, $filters);

            // Nếu filters chứa 'dealnow', lọc các sản phẩm có deal_id khác null
            if (in_array('dealnow', $filters)) {
                $query->whereNotNull('tbl_product.deal_id');
            } else {
                // Lọc theo các category nếu filters không phải là 'dealnow'
                $query->whereIn('category_name', $filters);
            }
        }

        // Thêm điều kiện tìm kiếm
        if ($search) {
            $query->where('product_name', 'like', '%' . $search . '%'); // Tìm kiếm theo tên sản phẩm
        }

        // Lọc sản phẩm hotdeal


        // Sắp xếp theo giá
        if ($sort === 'low-to-high') {
            $query->orderBy('product_price', 'asc');
        } elseif ($sort === 'high-to-low') {
            $query->orderBy('product_price', 'desc');
        }

        // Phân trang sản phẩm (10 sản phẩm mỗi trang)
        // $products = $query->paginate(12)->appends($request->only(['filter', 'sort', 'search']));
        $products = $query
            ->leftJoin('tbl_deal', 'tbl_product.deal_id', '=', 'tbl_deal.deal_id')
            ->select('tbl_product.*', 'tbl_deal.deal_discount', 'tbl_deal.deal_id')
            ->paginate(12)
            ->appends($request->only(['filter', 'sort', 'search']));

        // Trả về view với các sản phẩm đã được lọc, sắp xếp và tìm kiếm
        return view('page.product', compact('products'));
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $filter = $request->input('filter');
    //     $sort = $request->input('sort');

    //     // Khởi tạo query
    //     $productQuery = Product::query();

    //     // Tìm kiếm sản phẩm
    //     if ($query) {
    //         $productQuery->where('product_name', 'like', '%' . $query . '%')
    //             ->orWhere('product_desc', 'like', '%' . $query . '%');
    //     }

    //     // Lọc danh mục (nếu có)
    //     if ($filter) {
    //         $filters = explode('.', $filter);
    //         $productQuery->whereIn('category_name', $filters);
    //     }

    //     // Sắp xếp (nếu có)
    //     if ($sort === 'low-to-high') {
    //         $productQuery->orderBy('product_price', 'asc');
    //     } elseif ($sort === 'high-to-low') {
    //         $productQuery->orderBy('product_price', 'desc');
    //     }


    //     // Lấy kết quả
    //     $products = $productQuery->paginate(10);

    //     // Trả về view
    //     return view('page.product', compact('products', 'query', 'filter', 'sort'));
    // }



    public function detail($id)
    {
        // Fetch a single product with deal_discount
        $product = DB::table('tbl_product')
            ->leftJoin('tbl_deal', 'tbl_product.deal_id', '=', 'tbl_deal.deal_id')
            ->select('tbl_product.*', 'tbl_deal.deal_discount')
            ->where('tbl_product.product_id', $id)
            ->first(); // Fetch the first record as a single object, not a collection

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Get related products (up to 3) based on category_name
        $related_product = DB::table('tbl_product')
            ->leftJoin('tbl_deal', 'tbl_product.deal_id', '=', 'tbl_deal.deal_id')
            ->select('tbl_product.*', 'tbl_deal.deal_discount')
            ->where('tbl_product.category_name', $product->category_name) // Using the category from the single product
            ->where('tbl_product.product_id', '!=', $id)
            ->take(3) // Limit to 3 related products
            ->get(); // Return a collection of related products

        // Get feedbacks for the product
        $feedbacks = DB::table('tbl_feedback')
            ->join('tb_user', 'tbl_feedback.user_id', '=', 'tb_user.user_id') // Join với bảng tbl_user
            ->select('tbl_feedback.*', 'tb_user.user_name as user_name') // Chọn thông tin cần thiết
            ->where('tbl_feedback.product_id', $id)
            ->get();
            // Count feedbacks for the product
    $feedbackCount = $feedbacks->count();

    // Calculate rating statistics
    $ratingCounts = DB::table('tbl_feedback')
        ->select(DB::raw('rate, COUNT(*) as count'))
        ->where('product_id', $id)
        ->groupBy('rate')
        ->pluck('count', 'rate')->all();

    $totalFeedbacks = array_sum($ratingCounts);
    $ratingPercentages = [];
    for ($i = 1; $i <= 5; $i++) {
        $ratingPercentages[$i] = isset($ratingCounts[$i]) ? ($ratingCounts[$i] / $totalFeedbacks) * 100 : 0;
    }

    // Calculate average rating
    $averageRating = DB::table('tbl_feedback')
        ->where('product_id', $id)
        ->avg('rate');

    // Update product_rate in tbl_product
    DB::table('tbl_product')
        ->where('product_id', $id)
        ->update(['product_rate' => $averageRating]);

    return view('page.detail', compact('product', 'related_product', 'feedbacks', 'ratingPercentages', 'feedbackCount'));
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

            // Chuẩn bị dữ liệu để lưu
            $data = [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'comment' => $request->feedback_content,
                'rate' => $request->rating,
                'image' => null, // Mặc định là null
                'created_at' => now(),
            ];

            // Xử lý ảnh upload (nếu có)
            $get_image = $request->file('feedback_image');
            if ($get_image) {
                $new_image_name = $get_image->getClientOriginalName();
                $get_image->move(public_path('backend/image/feedback_images'), $new_image_name); // Lưu ảnh vào thư mục mong muốn
                $data['image'] = $new_image_name; // Lưu đường dẫn vào cơ sở dữ liệu
            }

            // Lưu feedback vào cơ sở dữ liệu
            Feedback::create($data);
            // Tính toán và cập nhật product_rate
            $averageRating = DB::table('tbl_feedback')
                ->where('product_id', $request->product_id)
                ->avg('rate');

            // Cập nhật product_rate trong bảng tbl_product
            DB::table('tbl_product')
                ->where('product_id', $request->product_id)
                ->update(['product_rate' => $averageRating]);
            return back()->with('success', 'Feedback đã được gửi thành công!');
        } catch (\Exception $e) {
            dd($e); // In ra toàn bộ thông tin lỗi để debug
        }
    }
}
