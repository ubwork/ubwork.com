<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\Candidates;
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
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'phone' => 'required|unique:candidates',
            'gender' => 'required',
            //'password2' => 'required'
        ];
        $messages = [
            'name.required' => 'Mời bạn nhập vào tên',
            'email.required' => 'Mời bạn nhập vào emal',
            'email.email' => 'Mời bạn nhập đúng định dạnh email',
            'email.unique' => 'Email bạn nhập đã tồn tại',
            'password.required' => 'Mời bạn nhập password',
            'phone.required' => 'Mời bạn nhập vào số điện thoại',
            'phone.unique' => 'Số điện thoại bạn nhập đã tồn tại',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('register')->withErrors($validator);
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $phone = $request->input('phone');
            $gender = $request->input('gender');
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelSv = new Candidates();
            $res = $modelSv->saveAdd($params);
            if ($res == null) {
                return redirect()->route('register');
            } elseif ($res > 0) {
                Session::flash('success', 'Dang ky thanh cong nguoi dung');
                return redirect()->route('candidate.register');
            } else {
                Session::flash('error', 'Loi dang ky');
                return redirect()->route('candidate.register');
            }
        }
    
}
}
