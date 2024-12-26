<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\Log;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    public function homepage()
    {
        $products = DB::table('tbl_product')
            ->leftJoin('tbl_deal', 'tbl_product.deal_id', '=', 'tbl_deal.deal_id')
            ->select('tbl_product.*', 'tbl_deal.deal_discount', 'tbl_deal.deal_id')
            ->get();
        return view('homepage', ['products' => $products]);
    }

    // public function cart()
    // {
    //     return view('page.cart');
    // }

    public function cart()
    {
        try {
            // Lấy thông tin người dùng hiện tại
            $userId = Auth::id();

            // Kiểm tra giỏ hàng của người dùng
            $cart = Cart::where('user_id', $userId)->with('details.product')->first();

            if (!$cart) {
                // Nếu giỏ hàng không tồn tại, trả về giỏ hàng rỗng
                $products = [];
                $totalPrice = 0;
            } else {
                // Tính tổng giá giỏ hàng = tổng giá từng sản phẩm
                $totalPrice = $cart->details->sum(function ($detail) {
                    return $detail->product->product_price * $detail->quantity;
                });

                // Cập nhật tổng giá vào bảng Cart
                $cart->total_price = $totalPrice;
                $cart->save();

                // Chuẩn bị danh sách sản phẩm từ giỏ hàng
                $products = $cart->details->map(function ($detail) {
                    return [
                        'id' => $detail->product->product_id,
                        'name' => $detail->product->product_name,
                        'image' => $detail->product->product_image,
                        'price' => $detail->product->product_price,
                        'quantity' => $detail->quantity,
                        'total' => $detail->product->product_price * $detail->quantity, // Tổng giá từng sản phẩm
                    ];
                })->toArray();
            }

            // Truyền dữ liệu vào view
            return view('page.cart', compact('products', 'totalPrice'));
        } catch (\Exception $e) {
            \Log::error('Error calculating cart total price:', ['error' => $e->getMessage()]);
            return view('page.cart', ['products' => [], 'totalPrice' => 0])
                ->withErrors('Không thể tải giỏ hàng. Vui lòng thử lại!');
        }
    }
    public function hotdeal()
    {
        return view('page.hotdeals');
    }
    public function contact()
    {
        return view('page.contact');
    }
    public function blog()
    {
        return view('page.blog');
    }
    public function delivery()
    {
        return view('page.delivery');
    }
}
