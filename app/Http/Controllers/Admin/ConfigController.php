<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfigController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $config = new Config();
        $this->v['list'] = Config::paginate(9);
        $this->v['title'] = "Danh sách cấu hình";

        return view('admin.config.index', $this->v);
    }
    public function create()
    {
        $this->v['title'] = "Thêm cấu hình";
        $config = new Config();
        $this->v['config'] = Config::where('status', 1)->get();
        return view('admin.config.add', $this->v);
    }

    public function store(Request $request)
    {
        $params = [];
        $params['cols'] = $request->post();
        // dd($params['cols']);
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        unset($params['cols']['_token']);
        $model = new Config();
        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return Redirect()->route('admin.config.create');
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return Redirect()->route('admin.config.index');
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return Redirect()->route('admin.config.create');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->v['title'] = "Cập nhật cấu hình";
        $model = new Config();
        $this->v['obj'] = Config::find($id);
        return view('admin.config.edit', $this->v);
    }

    public function update(Request $request, $id)
    {
        $method_route = 'admin.config.index';
        $params = [];
        $params['cols'] = $request->post();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }
        if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
            $params['cols']['banner'] = $this->uploadFile($request->file('banner'));
        }

        unset($params['cols']['_token']);

        $model = new Config();
        $obj = $model->find($id);

        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);

        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return Redirect()->route($method_route);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật ' . $obj->name . ' thành công!');
            return Redirect()->route($method_route);
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect()->route($method_route);
        }
    }

    public function destroy($id)
    {
        Config::where('id', $id)->delete();
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
        Config::where('id', $id)->update(['status' => $val]);
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }
}
