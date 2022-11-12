<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CandidateRequest;
use App\Models\Candidate;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CandidateController extends Controller
{
    public function index()
    {
        $data = Candidate::where('status', 1)->get();
        // dd($data);
        $maJor = Major::all();
        return view('client.candidate.candi-list', compact('data', 'maJor'));
    }
    public function detail()
    {
        $id = auth('candidate')->user()->id;
        $detail = Candidate::where('id', $id)->first();
        // dd($data);
        $maJor = Major::all();
        return view('client.candidate.candidate-profile', compact('detail', 'maJor'));
    }
    public function update(CandidateRequest $request)
    {
        $id = auth('candidate')->user()->id;
        $method_route = 'detail';
        $params = [];
        $params['cols'] = $request->post();

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
        }

        unset($params['cols']['_token']);
        $model = new Candidate();
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật  thành công!');
            return Redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return Redirect()->route($method_route, ['id' => $id]);
        }
    }
    public function change()
    {
        $maJor = Major::all();
        return view('client.candidate.change-password', compact('maJor'));
    }
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('images', $fileName, 'public');
    }
}
