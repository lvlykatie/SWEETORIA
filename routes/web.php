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
Route::get('/forgetpass', function () {
    return view('forgetPass_form');
});
Route::get('/resetpass', function () {
    return view('resetPass_form');
});



Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@showProductPage');

Route::get('/admin/orders', 'App\Http\Controllers\admin\OrderController@showOrderPage');

Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@showUserPage');

Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@showDealPage');

Route::get('/admin/accounts', 'App\Http\Controllers\admin\AccountController@showAccountPage');
