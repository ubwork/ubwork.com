<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
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

    public function store(CustomerRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();
        // dd($params['cols']);
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
        }
        unset($params['cols']['_token']);
        $model = new Customer();
        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect::to('admin.customer.add');
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect::to('admin.customer.list');
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect::to('admin.customer.add');
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

    // up ảnh
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
