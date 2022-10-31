<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Candidates;

class LoginController extends Controller
{
    //
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    // 
    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(AuthRequest $request)
    {
        $email = $request->input('email');
        // $password = password_hash($request->input('password'), PASSWORD_ARGON2I);

        // password_verify('adsadsasasa',$hash);
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return Redirect::to('/');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng');
            return Redirect::to('/login');
        }
    }

    public function getLogOut()
    {
        Auth::logout();
        return Redirect::to('/login');
    }
}
