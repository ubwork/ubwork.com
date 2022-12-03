<?php

namespace App\Http\Middleware;
use Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (Auth::check() == false) {
            return redirect()->route('login')->with('Vui lòng đăng nhập');
        }elseif (Auth::check() == false && auth('candidate')->user()->status === 0) {
            auth('candidate')->logout();
            return redirect()->route('login')->with('Tài Khoản Của bạn chưa được kích hoạt. Vui lòng kích hoạt tài khoản');
        }
    }
}
