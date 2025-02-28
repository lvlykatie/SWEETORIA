<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\loginGoogleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\client\LogoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\MomoController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\ManagerAuth;
use App\Http\Middleware\SellerAuth;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;

// admin routes
Route::group(['middleware' => AdminAuth::class], function () {
    // Admin dashboard
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index');

    // Products
    Route::get('/admin/products', 'App\Http\Controllers\admin\ProductController@showProductPage');
    Route::get('/admin/products/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
    Route::post('/admin/products/save', 'App\Http\Controllers\admin\ProductController@saveProduct');
    Route::get('/admin/products/delete/{product_id}', 'App\Http\Controllers\admin\ProductController@deleteProduct');
    Route::get('/admin/products/edit/{product_id}', 'App\Http\Controllers\admin\ProductController@editProduct');
    Route::post('/admin/products/update/{product_id}', 'App\Http\Controllers\admin\ProductController@updateProduct');
    Route::get('/admin/products/search', 'App\Http\Controllers\admin\ProductController@search')->name('products.search');

    // Orders
    Route::get('/admin/orders', 'App\Http\Controllers\admin\OrderController@showOrderPage');
    Route::get('/admin/orders/delete/{iv_id}', 'App\Http\Controllers\admin\OrderController@deleteOrder');
    Route::get('/admin/orders/edit/{iv_id}', 'App\Http\Controllers\admin\OrderController@editOrder');
    Route::post('/admin/orders/update/{iv_id}', 'App\Http\Controllers\admin\OrderController@updateOrder');
    Route::get('/admin/orders/search', 'App\Http\Controllers\admin\OrderController@search')->name('admin.orders.search');

    // Users
    Route::get('/admin/users', 'App\Http\Controllers\admin\UserController@showUserPage');
    Route::get('/admin/users/delete/{user_id}', 'App\Http\Controllers\admin\UserController@deleteUser');
    Route::get('/admin/users/edit/{user_id}', 'App\Http\Controllers\admin\UserController@editUser');
    Route::post('/admin/users/update/{user_id}', 'App\Http\Controllers\admin\UserController@updateUser');
    Route::get('/admin/users/search', 'App\Http\Controllers\admin\UserController@search')->name('users.search');

    // Deals
    Route::get('/admin/deals', 'App\Http\Controllers\admin\DealController@showDealPage');
    Route::get('/admin/deals/create', 'App\Http\Controllers\admin\DealController@addDealPage');
    Route::post('/admin/deals/save', 'App\Http\Controllers\admin\DealController@saveDeal');
    Route::get('/admin/deals/delete/{deal_id}', 'App\Http\Controllers\admin\DealController@deleteDeal');
    Route::get('/admin/deals/edit/{deal_id}', 'App\Http\Controllers\admin\DealController@editDeal');
    Route::post('/admin/deals/update/{deal_id}', 'App\Http\Controllers\admin\DealController@updateDeal');
    Route::get('/admin/deals/search', 'App\Http\Controllers\admin\DealController@search')->name('deals.search');

    // Vouchers
    Route::get('/admin/vouchers', 'App\Http\Controllers\admin\VoucherController@showVoucherPage');
    Route::get('/admin/vouchers/create', 'App\Http\Controllers\admin\VoucherController@addVoucherPage');
    Route::post('/admin/vouchers/save', 'App\Http\Controllers\admin\VoucherController@saveVoucher');
    Route::get('/admin/vouchers/edit/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@editVoucher');
    Route::post('/admin/vouchers/update/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@updateVoucher');
    Route::get('/admin/vouchers/delete/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@deleteVoucher');
    Route::get('/admin/vouchers/search', 'App\Http\Controllers\admin\VoucherController@search')->name('vouchers.search');

    // Accounts
    Route::get('/admin/feedbacks', 'App\Http\Controllers\admin\FeedbackController@showFeedbackPage');
    Route::get('/admin/feedbacks/accept/{fb_id}', 'App\Http\Controllers\admin\FeedbackController@acceptFeedback');
    Route::get('/admin/feedbacks/delete/{fb_id}', 'App\Http\Controllers\admin\FeedbackController@deleteFeedback');
    // logout
    Route::post('admin/logout', [AccountController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ManagerAuth::class], function () {
    //manager
    Route::get('/manager/dashboard', 'App\Http\Controllers\manager\DashboardController@index');

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
    Route::get('/manager/feedbacks', 'App\Http\Controllers\manager\FeedbackController@showFeedbackPage');

    // logout
    Route::post('manager/logout', [AccountController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => SellerAuth::class], function () {
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

    // logout
    Route::post('seller/logout', [AccountController::class, 'logout'])->name('logout');
});


// Route::get('/admin/products/search', 'App\Http\Controllers\admin\ProductController@search')->name('products.search');
// Route::get('/manager/products', 'App\Http\Controllers\manager\ProductController@search')->name('products.search');
// Route::get('/seller/products', 'App\Http\Controllers\seller\ProductController@search')->name('products.search');



// Homepage Route
Route::get('/', [PageController::class, 'homepage'])->name('homepage');

// Product Routes
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/hotdeals', [ProductController::class, 'hotdeals'])->name('hotdeals');
    Route::get('/{id}', [ProductController::class, 'detail'])->name('detail');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    // Route::get('/dealnow', [ProductController::class, 'hotdeal'])->name('product.hotdeal');
});
// Contact Route
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Blog Route
Route::get('/blog', [PageController::class, 'blog'])->name('blog');

// Delivery Route
Route::get('/delivery', [PageController::class, 'delivery'])->name('delivery');

// Payment Route (test)
Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('cart.buyNow');
Route::post('/buy-now', [ProductController::class, 'buyNow'])->name('buy.now');
Route::post('/buy-nowPD', [ProductController::class, 'buyNowPD'])->name('buy.nowPD');
Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/payment/momo', [MomoController::class, 'createPayment']);
Route::get('/payment_momo', [PaymentController::class, 'showPaymentMomo']);
Route::post('/payment-notify', [MomoController::class, 'paymentNotify']);
Route::get('/payment-success', [MomoController::class, 'paymentSuccess'])->name('paymentSuccess');
Route::post('/save-client-info', [PaymentController::class, 'saveClientInfo']);
Route::post('/cash-on-delivery', [PaymentController::class, 'cashOnDelivery'])->name('cash-on-delivery');



// Account Routes
Route::prefix('account')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('account');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::get('/changepw', [AccountController::class, 'changePassword'])->name('changepw');
    Route::get('/policy', [AccountController::class, 'policy'])->name('policy');
    Route::get('/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/update', [AccountController::class, 'update'])->name('account.update');
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::get('/orders/{status?}', [OrderController::class, 'getOrdersByStatus'])->name('orders.status');
});

// Cart Route
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
});



// User account route
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');

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


Route::post('/feedback', [ProductController::class, 'sendFeedBack'])->name('feedback');
Route::post('/apply-voucher', [PaymentController::class, 'applyVoucher'])->name('apply-voucher');
