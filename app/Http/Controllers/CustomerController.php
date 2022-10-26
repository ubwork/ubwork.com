<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function index()
    {
        $customer = new Customer();
        $listCustomer = $customer->loadList();
        if($listCustomer) {
            return view('admin.customer.index', [
                'list' => $listCustomer,
            ]);
        }
        return view('admin.customer.index', [
            'list' => null,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'phone' => 'required|numeric|unique:customers|digits:10'
        ];
        $messages = [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Sai định dạng email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu! ',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.numeric' => 'Số điện thoại phải là số!',
            'phone.digits' => 'Sai định dạng số điện thoại!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => $validator->errors(),
                    'code' => 404
                ]
            );
        }else {
            $params = [];
            $params['cols'] = $request->all();
            $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
            $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();
            unset($params['cols']['_token']);
            $model = new Customer();
            $res = $model->saveAdd($params);
            if($res == null) {
                return response()->json(
                    [
                        'message' => 'Vui lòng nhập dữ liệu !',
                        'code' => 404
                    ]
                );
            }
            else if ($res > 0) {
                return response()->json(
                    [
                        'message' => 'Thêm thành công !',
                        'code' => 200
                    ]
                );
            }else {
                return response()->json(
                    [
                        'message' => 'Lỗi thêm mới !',
                        'code' => 404
                    ]
                );
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
