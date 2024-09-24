<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('signUp_form');
});



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/admin/products', function () {
    return view('admin.components.products');
});

Route::get('/admin/orders', function () {
    return view('admin.components.orders');
});


Route::get('/admin/users', function () {
    return view('admin.components.users');
});


Route::get('/admin/deals', function () {
    return view('admin.components.deals');
});

Route::get('/admin/account', function () {
    return view('admin.components.account');
});
