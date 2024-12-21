<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\Log;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;

class PageController extends Controller
{
    public function homepage()
    {
        $products = Product::all();
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
               // Chuẩn bị danh sách sản phẩm từ giỏ hàng
               $products = $cart->details->map(function ($detail) {
                   return [
                       'id' => $detail->product->product_id,
                       'name' => $detail->product->product_name,
                       'image' => $detail->product->product_image,
                       'price' => $detail->product->product_price,
                       'quantity' => $detail->quantity,
                       'total' => $detail->product->product_price * $detail->quantity,
                   ];
               })->toArray();

               $totalPrice = $cart->total_price;
           }

            // Truyền dữ liệu vào view
            return view('page.cart', compact('products', 'totalPrice'));
        } catch (\Exception $e) {
            \Log::error('Error loading cart:', ['error' => $e->getMessage()]);
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
    public function payment()
    {
        return view('page.payment');
    }
}
