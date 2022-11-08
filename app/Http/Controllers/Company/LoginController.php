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
            return redirect('/');
        }
        return view('company.login.index');
    }
    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $message = [
            'email.required' => 'Mời bạn nhập vào email',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mời bạn nhập vào mật khẩu'

        ];
        $validator = Validator::make($request->all(), $rules, $message);
        // dd($request->all());
        if ($validator->fails()) {
            return redirect('company/login')->withErrors($validator);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            // dd(auth('company'));
            if (auth('company')->attempt(['email'=>$email, 'password'=>$password])){
                $data = auth('company')->user();
                auth('company')->login($data);
                return redirect('company/dashboard');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
                return redirect('company/login');
            }
        }

    }
    public function getLogout(){
        auth('company')->logout();
        return redirect('company/login');
    }
}
