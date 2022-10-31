<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CandidateRequest;
use App\Models\Candidates;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CandidateController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
    }

    public function index()
    {
        $candidate = new Candidates();
        $this->v['list'] = $candidate->loadList();
        $this->v['title'] = "Danh sách ứng viên có trong hệ thống";

        return view('admin.candidate.index', $this->v);
    }

    public function create()
    {
        $this->v['title'] = "Add candidates in the system";

        return view('admin.candidate.add', $this->v);
    }

    public function store(CandidateRequest $request)
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
        $model = new Candidates();
        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect()->route('admin.candidate.create');
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('admin.candidate.create');
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('admin.candidate.create');
        }
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->v['title'] = "Cập nhật ứng viên có trong hệ thống";
        $model = new Candidates();
        $this->v['obj'] = $model->loadOne($id);
        return view('admin.candidate.edit', $this->v);
    }

    public function update(CandidateRequest $request, $id)
    {
        $method_route = 'admin.candidate.edit';
        $params = [];
        $params['cols'] = $request->post();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new Candidates();
        $obj = $model->loadOne($id);
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
        Candidates::where('id', $id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        Session::flash('success', 'Xóa thành công!');
        return back();
    }

    // up ảnh
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('images', $fileName , 'public');
    }
}
