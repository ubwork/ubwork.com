<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\JobPostRequest;
use App\Models\JobPost;
use App\Models\Major;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobPostController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
        $this->v['activeRoute'] = 'post';
    }

    public function index()
    {
        $this->v['title'] = 'Quản lý tin tuyển dụng';
        $this->v['posts'] = JobPost::all();
        return view('company.post.index',$this->v);
    }

    public function create()
    { 
        $this->v['title'] = 'Đăng tin tuyển dụng';
        $this->v['majors'] = Major::all();
        return view('company.post.add',$this->v);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['company_id'] = auth('company')->user()->id;
            $skill = $request->input('skill');
            unset($data['skill']);
            unset($data['files']);
            $res = JobPost::create($data);
            
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('company.post.index');
        } catch (Exception $e) {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('company.post.create');
            throw new Exception($e->getMessage());
        }

    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $this->v['title'] = 'Sửa tin tuyển dụng';
        $this->v['majors'] = Major::all();
        $this->v['jobPost'] = JobPost::find($id);
        return view('company.post.edit',$this->v);
    }

    public function update(Request $request, $id)
    {
        try {
            $model = JobPost::find($id);
            $data = $request->all();
            $data['company_id'] = auth('company')->user()->id;
            $skill = $request->input('skill');
            unset($data['skill']);
            unset($data['files']);
            $res = $model->update($data);
            
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('company.post.index');
        } catch (Exception $e) {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('company.post.edit',$id);
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        //
    }
}
