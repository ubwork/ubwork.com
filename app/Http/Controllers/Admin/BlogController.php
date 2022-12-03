<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $blog = new Blog();
        $this->v['list'] = Blog::paginate(9);
        $this->v['title'] = "Danh sách bài viết";

        return view('admin.blog.index', $this->v);
    }
    public function create()
    {
        $this->v['title'] = "Thêm Bài viết";
        $author = new Author();
        $this->v['author'] = Author::where('status', 1)->get();
        return view('admin.blog.add', $this->v);
    }

    public function store(Request $request)
    {
        $params = [];
        $params['cols'] = $request->post();
        // dd($params['cols']);
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['banner'] = $this->uploadFile($request->file('image'));
        }
        unset($params['cols']['_token']);
        $model = new Blog();
        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect()->route('admin.blog.create');
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('admin.blog.index');
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('admin.blog.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->v['title'] = "Cập nhật bài viết";
        $model = new Blog();
        $this->v['obj'] = Blog::find($id);
        $author = new Author();
        $this->v['author'] = Author::where('status', 1)->get();
        return view('admin.blog.edit', $this->v);
    }

    public function update(Request $request, $id)
    {
        $method_route = 'admin.blog.edit';
        $params = [];
        $params['cols'] = $request->post();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            $params['cols']['banner'] = $this->uploadFile($request->file('banner'));
        }

        unset($params['cols']['_token']);

        $model = new Blog();
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
        Blog::where('id', $id)->delete();
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
        Blog::where('id', $id)->update(['status' => $val]);
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
