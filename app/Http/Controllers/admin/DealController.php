<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DealController extends Controller
{
    public function showDealPage(){
        return view ('admin.components.deals');
    }
}
