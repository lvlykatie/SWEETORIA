<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Session::has('user_id')) {
            return redirect('/signin')->with('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
        }

        return $next($request);
    }
}