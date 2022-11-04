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
            'name' => 'required|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6',
			'phone' => 'required|max:10',
        ];
        $message = [
            'name.required' => 'Họ và tên là trường bắt buộc',
            'name.max' => 'Họ và tên không quá 255 ký tự',
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'phone.required' => 'Số điện thoại là trường bắt buộc',
            // 'phone.required' => 'Số điện thoại phải là số nguyên',
            'phone.max' => 'Số điện thoại không quá 10 số',

        ];
        $validator = Validator::make($data = $request->all(), $rules, $message);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();
        $data['password'] = Hash::make($request->password);
        Company::create($data);
        Session::flash('message', trans('system.success'));
        Session::flash('alert-class', 'success');
        return redirect()->route('login');
    }
}
