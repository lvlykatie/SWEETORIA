<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class ProductController extends Controller
{
    public function showProductPage(){
        return view ('admin.products.products');
    }
    public function addProductPage(){
        return view ('admin.products.add-product');
    }
}
