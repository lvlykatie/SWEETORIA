<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Container\Attributes\Log;
use App\Models\Cart;                
use App\Models\CartDetails;          
use App\Models\Product; 

class CartController extends Controller
{
    public function add(Request $request)
    {
        try {
            // Lấy dữ liệu từ request
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity', 1); // Mặc định là 1
    
            // Kiểm tra dữ liệu đầu vào
            if (!$productId || $quantity <= 0) {
                return response()->json(['success' => false, 'message' => 'Invalid input data.'], 400);
            }
    
            // Kiểm tra sản phẩm có tồn tại không
            $product = Product::find($productId);
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
            }
    
            // Lấy thông tin người dùng hiện tại
            $userId = Auth::id();
    
            // Kiểm tra hoặc tạo giỏ hàng
            $cart = Cart::firstOrCreate(
                ['user_id' => $userId],
                ['total_price' => 0]
            );
    
            // Kiểm tra sản phẩm đã có trong giỏ chưa
            $cartDetail = CartDetails::where('cart_id', $cart->cart_id)
                ->where('product_id', $productId)
                ->first();
    
            if ($cartDetail) {
                // Tăng số lượng nếu sản phẩm đã tồn tại
                $cartDetail->quantity += $quantity;
                $cartDetail->save();
            } else {
                // Thêm sản phẩm mới vào giỏ hàng
                CartDetails::create([
                    'cart_id' => $cart->cart_id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ]);
            }
    
            // Cập nhật tổng giá giỏ hàng
            $cart->total_price += $product->product_price * $quantity;
            $cart->save();
    
            return response()->json(['success' => true, 'message' => 'Product added to cart!']);
        } catch (\Exception $e) {
            // Ghi log lỗi và trả về thông báo lỗi
            \Log::error('Error adding to cart: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while adding to cart.'], 500);
        }
    }
    
    
    public function updateQuantity(Request $request)
    {
        try {
            $userId = Auth::id();

            // Lấy giỏ hàng của người dùng
            $cart = Cart::where('user_id', $userId)->first();

            if (!$cart) {
                return response()->json(['success' => false, 'message' => 'Cart not found']);
            }

            // Tìm sản phẩm trong giỏ hàng
            $cartDetail = CartDetails::where('cart_id', $cart->cart_id)
                ->where('product_id', $request->input('product_id'))
                ->first();

            if (!$cartDetail) {
                return response()->json(['success' => false, 'message' => 'Product not found in cart']);
            }

            // Cập nhật số lượng sản phẩm
            $newQuantity = $request->input('quantity');
            if ($newQuantity <= 0) {
                $cartDetail->delete();
            } else {
                $cartDetail->quantity = $newQuantity;
                $cartDetail->save();
            }

            // Tính lại tổng giá giỏ hàng
            $cart->total_price = $cart->details->sum(function ($detail) {
                return $detail->quantity * $detail->product->product_price;
            });
            $cart->save();

            return response()->json([
                'success' => true,
                'productTotalPrice' => $cartDetail->quantity * $cartDetail->product->product_price,
                'newTotalPrice' => $cart->total_price,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating quantity:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Error updating quantity']);
        }
    }

}
