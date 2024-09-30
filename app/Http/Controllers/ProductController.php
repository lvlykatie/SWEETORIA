<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('page.product');
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
