<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (auth('company')->check()) {
            Session::flash('Account is logged in');
            return redirect()->route('home');
        }
        return view('company.login.index');
    }
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $message = [
            'email.required' => 'Email bắt buộc nhập!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mật khẩu bắt buộc nhập!'

        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('company/login')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            // dd(auth('company'));
            if (auth('company')->attempt(['email'=>$email, 'password'=>$password])){
                return redirect('company');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
                return redirect('company/login');
            }
        }

    }
}
