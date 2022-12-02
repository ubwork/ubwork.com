<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['feed']=Feedback::where('is_candidate',0)->get();
        $this->v['list'] = Company::paginate(9);
        $this->v['title'] = "Danh sách công ty";
        return view("admin.companies.index", $this->v);
    }


    public function create()
    {
        $this->v['title'] = "Thêm công ty";
        return view("admin.companies.add", $this->v,);
    }


    public function store(CompanyRequest $request)
    {
        $this->v['title'] = "Thêm Công Ty";
        if ($request->isMethod('post')) {
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['cols']['logo'] = $this->uploadFile($request->file('image'));
            }
            $modelTest = new Company();
            $res = $modelTest->saveAdd($params);
            if($res == null) {
                Session::flash('error', 'Vui lòng nhập dữ liệu!');
                return Redirect()->route('admin.company.create');
            }
            else if ($res > 0) {
                Session::flash('success', 'Thêm thành công!');
                return Redirect()->route('admin.company.index');
            }else {
                Session::flash('error', 'Lỗi thêm mới!');
                return Redirect()->route('admin.company.create');
            }
        }
        return view("admin/companies.add", $this->v);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $this->v['title'] = "Cập nhật công ty";
        $obj = Company::find($id);
        $this->v['obj'] = $obj;
        return view("admin.companies.edit", $this->v);
    }


    public function update(CompanyRequest $request, $id)
    {
        $method_route = 'admin.company.edit';
        $params = [];
        $params['cols'] = $request->post();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['logo'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new Company();
        $obj = $model->find($id);
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
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
        Company::where('id', $id)->delete();
        return response()->json(['success'=>'Xóa thành công!']);
    }

    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('images', $fileName, 'public');
    }

    public function status(Request $request, $id) {
        $params = [];
        $params['cols'] = $request->all();
        unset($params['cols']['_token']);
        $val = $params['cols']['status'];
        Company::where('id', $id)->update(['status' => $val]);
        return response()->json(['success'=>'Cập nhật trạng thái thành công!']);
    }
}
