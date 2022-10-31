<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Candidates;
use Illuminate\Console\View\Components\Alert;

class LoginController extends Controller
{
    //
   
    public function getLogin(){
        if (auth('candidate')->check()) {
            Session::flash(__('Account is logged in'));
            return Redirect::to('/');
        }
        return view('client.login.login');
        
    }

    public function postLogin(AuthRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


        if (auth('candidate')->attempt(['email' => $email, 'password' => $password])) {
            return Redirect::to('/');
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng');
            return Redirect::to('/login');
        }
    }

  
}
