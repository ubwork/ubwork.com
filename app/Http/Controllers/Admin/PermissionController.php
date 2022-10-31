<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['title'] = __('Permission list');
        $this->v['permissions'] = Permission::all();
        return view('admin.permission.index',$this->v);
    }

    public function create()
    {
        $this->v['title'] = __('Permission add');
        return view('admin.permission.add',$this->v);
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
