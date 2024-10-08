<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;

// Homepage Route
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

// Product Routes
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/{id}/detail', [ProductController::class, 'detail'])->name('detail');
    Route::get('/hotdeals', [ProductController::class, 'hotdeals'])->name('hotdeals');
});

// Account Routes
Route::prefix('account')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('account');
    Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
    Route::get('/changepw', [AccountController::class, 'changePassword'])->name('changepw');
});

// Cart Route
Route::get('/cart', [PageController::class, 'cart'])->name('cart');


Route::get('/signup', function () {
    return view('signUp_form');
});

Route::get('/signin', function () {
    return view('signIn_form');
});


// Route xử lý yêu cầu đăng nhập (POST)
Route::post('/signin', 'App\Http\Controllers\client\loginController@signIn');

// Route xử lý yêu cầu đăng kí (POST)
Route::post('/signup', 'App\Http\Controllers\client\registerController@register');

// Route xử lý yêu cầu send OTP (POST)
Route::post('/forgetpass', 'App\Http\Controllers\client\ForgetPassController@checkEmail');


Route::get('/forgetpass', function () {
    return view('forgetPass_form');
});
//Route::post('/check-email', 'App\Http\Controllers\client\UserAuthController@checkEmail');

Route::get('/resetpass', function () {
    return view('resetPass_form');
});



Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@showProductPage');
Route::get('/admin/products/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
Route::post('/admin/products/save', 'App\Http\Controllers\admin\ProductController@saveProduct');
Route::post('/admin/products/delete/{product_id}', 'App\Http\Controllers\admin\ProductController@deleteProduct');


Route::get('/admin/orders', 'App\Http\Controllers\admin\OrderController@showOrderPage');

Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@showUserPage');
Route::post('/admin/users/delete/{user_id}', 'App\Http\Controllers\admin\UserController@deleteUser');

Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@showDealPage');
Route::get('/admin/deals/create', 'App\Http\Controllers\admin\DealController@addDealPage');
Route::post('/admin/deals/save', 'App\Http\Controllers\admin\DealController@saveDeal');
Route::post('/admin/deals/delete/{deal_id}', 'App\Http\Controllers\admin\DealController@deleteDeal');

Route::get('/admin/accounts', 'App\Http\Controllers\admin\AccountController@showAccountPage');
