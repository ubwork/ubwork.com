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

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('image'));
        }
        unset($params['cols']['_token']);
        $model = new Customer();
        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect()->route('admin.customer.add');
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('admin.customer.add');
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('admin.customer.add');
        }
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->v['title'] = "Cập nhật ứng viên có trong hệ thống";
        $model = new Customer();
        $this->v['obj'] = $model->loadOne($id);
        return view('admin.customer.edit', $this->v);
    }

    public function update(CustomerRequest $request, $id)
    {
        $method_route = 'admin.customer.edit';
        $params = [];
        $params['cols'] = $request->post();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new Customer();
        $obj = $model->loadOne($id);
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if($res == null) {
            Session::flash('error', 'Bạn chưa thực hiện thay đổi nào!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật '.$obj->name .' thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        Session::flash('success', 'Xóa thành công!');
        return back();
    }

    // up ảnh
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
