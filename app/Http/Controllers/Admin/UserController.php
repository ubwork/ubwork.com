<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function index()
    {
        $this->v['title'] = __('User list');
        $this->v['users'] = User::all();
        return view('admin.user.index',$this->v);
    }

    public function create()
    {
        $this->v['title'] = __('Form add user');
        return view('admin.user.add',$this->v);
    }

    public function store(UserRequest $request)
    {
        dd($request);
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
        try {
            User::where('id',$id)->delete();

        } catch (\Throwable $th) {
            throw $th;
        }
        // dd(User::where('id',$id)->delete());
        // User::where('id',$id);
        // $model = User::findOrFail($id);
        // if ($model!=null && $cate == false) {
        //     $model->delete();
        //     $success = true;
        //     $message = __('messages.delete.success');
        // } else {
        //     $success =  false;
        //     $message = __('messages.add.failed');
        // }
        // return response()->json([
        //     'success'=> $success,
        //     'message' =>  $message
        // ]);
    }
}
