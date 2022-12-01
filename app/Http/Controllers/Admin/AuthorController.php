<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $author = new Author();
        $this->v['list'] = Author::paginate(9);
        if ($key = request()->key);
        $this->v['list'] = Author::where('name', 'like', '%' . $key . '%')->paginate(9);
        $this->v['title'] = "Danh sách tác giả";
        return view('admin.author.index', $this->v);
    }

    public function create()
    {
        $this->v['title'] = "Thêm tác giả";

        return view('admin.author.add', $this->v);
    }

    public function store(Request $request)
    {
        $params = [];
        $params['cols'] = $request->post();
        // dd($params['cols']);
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('image'));
        }
        unset($params['cols']['_token']);
        $model = new Author();
        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect()->route('admin.auhtor.create');
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('admin.author.index');
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('admin.author.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->v['title'] = "Cập nhật ứng viên";
        $model = new Author();
        $this->v['obj'] = Author::find($id);
        return view('admin.author.edit', $this->v);
    }

    public function update(Request $request, $id)
    {
        $method_route = 'admin.author.edit';
        $params = [];
        $params['cols'] = $request->post();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new Author();
        $obj = $model->find($id);

        $params['cols']['id'] = $id;

        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật ' . $obj->name . ' thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
    }

    public function destroy($id)
    {
        Author::where('id', $id)->delete();
        return response()->json(['success' => 'Xóa thành công!']);
    }

    // up ảnh
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('images', $fileName, 'public');
    }

    // cập nhật trạng thái
    public function status(Request $request, $id)
    {
        $params = [];
        $params['cols'] = $request->all();
        // dd($params['cols']);
        unset($params['cols']['_token']);
        $val = $params['cols']['status'];
        Author::where('id', $id)->update(['status' => $val]);
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
