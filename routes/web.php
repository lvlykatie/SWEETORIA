<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\loginGoogleController;
use App\Http\Controllers\CartController;

// Homepage Route
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

// Product Routes
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/hotdeals', [ProductController::class, 'hotdeals'])->name('hotdeals');
    Route::get('/{id}', [ProductController::class, 'detail'])->name('detail');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
});
// Contact Route
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Blog Route
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

// Delivery Route
Route::get('/delivery', [PageController::class, 'delivery'])->name('delivery');

// Payment Route (test)
Route::get('/payment', [PageController::class, 'payment'])->name('payment');

// Account Routes
Route::prefix('account')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('account');
    Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
    Route::get('/changepw', [AccountController::class, 'changePassword'])->name('changepw');
    Route::get('/policy', [AccountController::class, 'policy'])->name('policy');
});

// Cart Route
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
});



// User account route

    Route::get('/signup', function () {
        return view('signUp_form');
    });
    // Route xử lý yêu cầu đăng kí (POST)
    Route::post('/signup', 'App\Http\Controllers\client\registerController@register');

    Route::get('/signin', function () {
        return view('signIn_form');
    });
    // Route xử lý yêu cầu đăng nhập (POST)
    Route::post('/signin', 'App\Http\Controllers\client\loginController@signIn');

    Route::get('/forgetpass', function () {
        return view('forgetPass_form');
    });
    Route::get('/otp', function () {
        return view('otp');
    });
    Route::get('/otpcode', function () {
        return view('otpcode');
    });

    // Route xử lý yêu cầu send OTP (POST)
    Route::post('/forgetpass', 'App\Http\Controllers\client\ForgetPassController@checkEmail');
    // Route xử lý xác thực OTP (POST)
    Route::post('/otp', 'App\Http\Controllers\client\ForgetPassController@verifyOTP');

    Route::get('/resetpass', function () {
        return view('resetPass_form');
    });
    // Route xử lý tạo lại mật khẩu (POST)
    Route::post('/resetpass', 'App\Http\Controllers\client\ForgetPassController@resetPassword');

// Login Google Route
    Route::get('/auth/google/redirect', [loginGoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [loginGoogleController::class, 'handleGoogleCallback']);
















//admin
Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

//products
Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@showProductPage');
Route::get('/admin/products/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
Route::post('/admin/products/save', 'App\Http\Controllers\admin\ProductController@saveProduct');
Route::get('/admin/products/delete/{product_id}', 'App\Http\Controllers\admin\ProductController@deleteProduct');
Route::get('/admin/products/edit/{product_id}', 'App\Http\Controllers\admin\ProductController@editProduct');
Route::post('/admin/products/update/{product_id}', 'App\Http\Controllers\admin\ProductController@updateProduct');
Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@search')->name('products.search');

//orders
Route::get('/admin/orders', 'App\Http\Controllers\admin\OrderController@showOrderPage');
Route::get('/admin/orders/delete/{iv_id}', 'App\Http\Controllers\admin\OrderController@deleteOrder');
Route::get('/admin/orders/edit/{iv_id}', 'App\Http\Controllers\admin\OrderController@editOrder');
Route::post('/admin/orders/update/{iv_id}', 'App\Http\Controllers\admin\OrderController@updateOrder');
Route::get('/admin/orders/search', 'App\Http\Controllers\admin\OrderController@search')->name('admin.orders.search');

//users
Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@showUserPage');
Route::get('/admin/users/delete/{user_id}', 'App\Http\Controllers\admin\UserController@deleteUser');
Route::get('/admin/users/edit/{user_id}', 'App\Http\Controllers\admin\UserController@editUser');
Route::post('/admin/users/update/{user_id}', 'App\Http\Controllers\admin\UserController@updateUser');
Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@search')->name('users.search');

//deals
Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@showDealPage');
Route::get('/admin/deals/create', 'App\Http\Controllers\admin\DealController@addDealPage');
Route::post('/admin/deals/save', 'App\Http\Controllers\admin\DealController@saveDeal');
Route::get('/admin/deals/delete/{deal_id}', 'App\Http\Controllers\admin\DealController@deleteDeal');
Route::get('/admin/deals/edit/{deal_id}', 'App\Http\Controllers\admin\DealController@editDeal');
Route::post('/admin/deals/update/{deal_id}', 'App\Http\Controllers\admin\DealController@updateDeal');
Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@search')->name('deals.search');

//vouchers
Route::get('/admin/vouchers', 'App\Http\Controllers\admin\VoucherController@showVoucherPage');
Route::get('/admin/vouchers/create', 'App\Http\Controllers\admin\VoucherController@addVoucherPage');
Route::post('/admin/vouchers/save', 'App\Http\Controllers\admin\VoucherController@saveVoucher');
Route::get('/admin/vouchers/edit/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@editVoucher');
Route::post('/admin/vouchers/update/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@updateVoucher');
Route::get('/admin/vouchers/delete/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@deleteVoucher');
Route::get('/admin/vouchers', 'App\Http\Controllers\admin\VoucherController@search')->name('vouchers.search');

//accounts
Route::get('/admin/accounts', 'App\Http\Controllers\admin\AccountController@showAccountPage');




//manager
Route::get('/manager/dashboard', 'App\Http\Controllers\manager\DashboardController@showDashboard');

//products
Route::get('/manager/products', 'App\Http\Controllers\manager\ProductController@showProductPage');
Route::get('/manager/products/create', 'App\Http\Controllers\manager\ProductController@addProductPage');
Route::post('/manager/products/save', 'App\Http\Controllers\manager\ProductController@saveProduct');
Route::get('/manager/products/delete/{product_id}', 'App\Http\Controllers\manager\ProductController@deleteProduct');
Route::get('/manager/products/edit/{product_id}', 'App\Http\Controllers\manager\ProductController@editProduct');
Route::post('/manager/products/update/{product_id}', 'App\Http\Controllers\manager\ProductController@updateProduct');
Route::get('/manager/products', 'App\Http\Controllers\manager\ProductController@search')->name('products.search');

//orders
Route::get('/manager/orders', 'App\Http\Controllers\manager\OrderController@showOrderPage');
Route::get('/manager/orders/delete/{iv_id}', 'App\Http\Controllers\manager\OrderController@deleteOrder');
Route::get('/manager/orders/edit/{iv_id}', 'App\Http\Controllers\manager\OrderController@editOrder');
Route::post('/manager/orders/update/{iv_id}', 'App\Http\Controllers\manager\OrderController@updateOrder');
Route::get('/manager/orders/search', 'App\Http\Controllers\manager\OrderController@search')->name('manager.orders.search');

 //deals
Route::get('/manager/deals', 'App\Http\Controllers\manager\DealController@showDealPage');
Route::get('/manager/deals/create', 'App\Http\Controllers\manager\DealController@addDealPage');
Route::post('/manager/deals/save', 'App\Http\Controllers\manager\DealController@saveDeal');
Route::get('/manager/deals/delete/{deal_id}', 'App\Http\Controllers\manager\DealController@deleteDeal');
Route::get('/manager/deals/edit/{deal_id}', 'App\Http\Controllers\manager\DealController@editDeal');
Route::post('/manager/deals/update/{deal_id}', 'App\Http\Controllers\manager\DealController@updateDeal');
Route::get('/manager/deals', 'App\Http\Controllers\manager\DealController@search')->name('deals.search');

//vouchers
Route::get('/manager/vouchers', 'App\Http\Controllers\manager\VoucherController@showVoucherPage');
Route::get('/manager/vouchers/create', 'App\Http\Controllers\manager\VoucherController@addVoucherPage');
Route::post('/manager/vouchers/save', 'App\Http\Controllers\manager\VoucherController@saveVoucher');
Route::get('/manager/vouchers/edit/{voucher_id}', 'App\Http\Controllers\manager\VoucherController@editVoucher');
Route::post('/manager/vouchers/update/{voucher_id}', 'App\Http\Controllers\manager\VoucherController@updateVoucher');
Route::get('/manager/vouchers/delete/{voucher_id}', 'App\Http\Controllers\manager\VoucherController@deleteVoucher');
Route::get('/manager/vouchers', 'App\Http\Controllers\manager\VoucherController@search')->name('vouchers.search');

//accounts
Route::get('/manager/accounts', 'App\Http\Controllers\manager\AccountController@showAccountPage');




//seller
Route::get('/seller/dashboard', 'App\Http\Controllers\seller\DashboardController@showDashboard');

//orders
Route::get('/seller/orders', 'App\Http\Controllers\seller\OrderController@showOrderPage');
Route::get('/seller/orders/delete/{iv_id}', 'App\Http\Controllers\seller\OrderController@deleteOrder');
Route::get('/seller/orders/edit/{iv_id}', 'App\Http\Controllers\seller\OrderController@editOrder');
Route::post('/seller/orders/update/{iv_id}', 'App\Http\Controllers\seller\OrderController@updateOrder');
Route::get('/seller/orders/search', 'App\Http\Controllers\seller\OrderController@search')->name('seller.orders.search');

//products
Route::get('/seller/products', 'App\Http\Controllers\seller\ProductController@showProductPage');
Route::get('/seller/products', 'App\Http\Controllers\seller\ProductController@search')->name('products.search');