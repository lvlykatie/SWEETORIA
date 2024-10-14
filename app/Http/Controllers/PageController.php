<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function homepage()
    {
        $products = Product::all();
        return view('homepage', ['products' => $products]);
    }

    public function cart()
    {
        return view('page.cart');
    }
}
