<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v = [];
    }
    public function getRegister(){
        return view('client.register.index');
    }
    
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'phone' => 'required|unique:candidates',
            'gender' => 'required',
        ];
        $messages = [
            'name.required' => 'Mời bạn nhập vào tên',
            'email.required' => 'Mời bạn nhập vào email',
            'email.email' => 'Mời bạn nhập đúng định dạnh email',
            'email.unique' => 'Email bạn nhập đã tồn tại',
            'password.required' => 'Mời bạn nhập password',
            'phone.required' => 'Mời bạn nhập vào số điện thoại',
            'phone.unique' => 'Số điện thoại bạn nhập đã tồn tại',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->route('candidate.register')->withErrors($validator);
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $phone = $request->input('phone');
            $gender = $request->input('gender');
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelSv = new Candidate();
            $res = $modelSv->saveAdd($params);
            if ($res == null) {
                return redirect()->route('candidate.register');
            } elseif ($res > 0) {
                Session::flash('success', 'Dang ky thanh cong nguoi dung');
                return redirect()->route('candidate.login');
            } else {
                Session::flash('error', 'Loi dang ky');
                return redirect()->route('candidate.register');
            }
        }
    
}
}
