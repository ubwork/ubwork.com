<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
        $this->v['activeRoute'] = 'post';
    }

    public function index()
    {
        $this->v['title'] = 'Quản lý tin tuyển dụng';
        return view('company.post.index',$this->v);
    }

    public function create()
    { 
        $this->v['title'] = 'Đăng tin tuyển dụng';
        return view('company.post.add',$this->v);
    }

    public function store(Request $request)
    {
        //
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
