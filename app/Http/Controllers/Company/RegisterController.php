<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('company.register.index');
    }
    public function postRegister(Request $request) {
        $rules = [
            'company_name' => 'required|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6',
			'phone' => 'required|max:10',
        ];
        $message = [
            'company_name.required' => 'Vui lòng nhập vào tên công ty',
            'company_name.max' => 'Tên công ty không quá 255 ký tự',
            'email.required' => 'Vui lòng nhập vào email',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập vào mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'phone.required' => 'Vui lòng nhập vào số điện thoại',
            'phone.max' => 'Số điện thoại không quá 10 số',

        ];
        $validator = Validator::make($data = $request->all(), $rules, $message);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();
        $data['password'] = Hash::make($request->password);
        Company::create($data);
        // Session::flash('message', trans('system.success'));
        Session::flash('success', 'Đăng ký thành công');
        return redirect()->route('company.login');
    }
}
