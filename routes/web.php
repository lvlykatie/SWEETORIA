<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('signUp_form'); // Thay 'home' bằng tên file .blade.php của bạn
});

