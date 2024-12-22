<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('manager.manager-dashboard');
    }
}
