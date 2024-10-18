<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('page.product', ['products' => $products]);
    }

    public function detail($id)
    {
        return view('page.detail', compact('id')); // Pass $id to the view if needed
    }

    public function hotdeals()
    {
        return view('page.hotdeal');
    }

}
