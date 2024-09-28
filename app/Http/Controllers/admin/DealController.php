<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class DealController extends Controller
{
    public function showDealPage(){
        return view ('admin.deals.deals');
    }
    public function addDealPage(){
        return view ('admin.deals.add-deal');
    }
}
