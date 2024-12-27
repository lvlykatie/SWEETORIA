<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // Check if the admin session exists
        if (!Session::has('admin_id')) {
            return redirect('/signin')->with('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
        }

        // Optionally, check admin privileges further (if needed)
        return $next($request);
    }
}
