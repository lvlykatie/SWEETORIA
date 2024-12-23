<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Container\Attributes\Log;
use App\Models\Cart;                
use App\Models\CartDetails;          
use App\Models\Product; 
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    //
    // public function showPaymentPage()
    // {
    //     //return view('page.payment');
        
    // }

    public function showPaymentPage()
    {
        $selectedProducts = Session::get('selectedProducts', []);
        $productDetails = [];

        foreach ($selectedProducts as $item) {
            $product = Product::find($item['productId']);
            if ($product) {
                $productDetails[] = [
                    'name' => $product->product_name,
                    'quantity' => $item['quantity'],
                    'price' => $product->product_price,
                    'total' => $product->product_price * $item['quantity'],
                ];
            }
        }

        $total = array_sum(array_column($productDetails, 'total'));

        return view('page.payment', [
            'products' => $productDetails,
            'total' => $total,
            'date' => now()->format('Y-m-d'),
        ]);
    }
}
