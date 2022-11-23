<?php

namespace App\Http\Controllers\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Candidate;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function getLogin()
    {

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

        if (auth('candidate')->attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            $data = auth('candidate')->user();
            auth('candidate')->login($data);
            Session::flash('success', 'Đăng nhập thành công');
            return redirect()->back();
        } else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng');
            return Redirect::to('/login');
        }
    }
    public function logout()
    {
        if (auth('candidate')->check()) {
            auth('candidate')->logout();
            return Redirect::to('/login');
        }
    }
}
