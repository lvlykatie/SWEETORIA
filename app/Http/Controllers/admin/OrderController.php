<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class OrderController extends Controller
{
    public function showOrderPage(){
        return view ('admin.orders.orders');
    }
}
