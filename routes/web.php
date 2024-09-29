<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signUp_form');
});

Route::get('/signin', function () {
    return view('signIn_form');
});

// Route xử lý đăng nhập (POST)
Route::post('/signin', 'App\Http\Controllers\client\UserAuthController@login');



Route::get('/forgetpass', function () {
    return view('forgetPass_form');
});
Route::post('/check-email', 'App\Http\Controllers\client\UserAuthController@checkEmail');

Route::get('/resetpass', function () {
    return view('resetPass_form');
});



Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@showProductPage');

Route::get('/admin/orders', 'App\Http\Controllers\admin\OrderController@showOrderPage');

Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@showUserPage');

Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@showDealPage');

Route::get('/admin/accounts', 'App\Http\Controllers\admin\AccountController@showAccountPage');

Route::get('/admin/products/create', 'App\Http\Controllers\admin\ProductController@addProductPage');

Route::get('/admin/deals/create', 'App\Http\Controllers\admin\DealController@addDealPage');
