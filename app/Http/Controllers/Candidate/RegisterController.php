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
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    //
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function getRegister()
    {
        return view('client.register.index');
    }

    public function postRegister(Request $request)
    {
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
            $users = new Candidate();
            $data = $request->only('name', 'email', 'phone', 'password', 'gender');
            $token = strtoupper(Str::random(10));
            $data['token'] = strtoupper(Str::random(10));
            $data['password'] = bcrypt($request->password);
            $data['status'] = 0;
            if ($candidate = Candidate::create($data)) {
                Mail::send('email.active-acc', compact('candidate'), function ($email) use ($candidate) {
                    $email->subject('UbWork - Xác nhận tài khoản');
                    $email->to($candidate->email, $candidate->name);
                });
            }
            if ($users == null) {
                return redirect()->route('candidate.register');
            } elseif ($users != null) {
                Session::flash('success', 'Đăng ký thành công');
                return redirect()->route('candidate.login');
            } else {
                Session::flash('error', 'Lỗi đăng ký');
                return redirect()->route('candidate.register');
            }
        }
    }
    public function actived(Candidate $candidate, $token)
    {
        if ($candidate->token === $token) {
            $candidate->update([
                'status' => 1,
                'verify_time' => Carbon::now(),
                'token' => null
            ]);
            return redirect()->route('candidate.login')->with('success', 'Kích Hoạt Tài Khoản Thành Công');
        } else {
            return redirect()->route('candidate.register')->with('error', 'Sai mã kích hoạt vui lòng thử lại');
        }
    }
}
