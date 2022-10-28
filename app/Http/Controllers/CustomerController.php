<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    public function index()
    {
        $customer = new Customer();
        $this->v['list'] = $customer->loadList();
        $this->v['title'] = "Danh sách ứng viên có trong hệ thống";

        return view('admin.customer.index', $this->v);
    }

    public function create()
    {
        $this->v['title'] = "Thêm ứng viên vào trong hệ thống";

        return view('admin.customer.add', $this->v);
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
                Session::flash('error', 'Vui lòng nhập dữ liệu!');
                return Redirect::to('/product');
            }
            else if ($res > 0) {
                Session::flash('success', 'Thêm sản phẩm thành công!');
                return Redirect::to('/product');
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return Redirect::to('/product');
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
