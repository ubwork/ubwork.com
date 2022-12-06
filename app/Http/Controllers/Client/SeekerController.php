<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\Upcv;
use App\Models\Major;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SeekerController extends Controller
{
    public function index()
    {
        if(auth('candidate')->check()) {
            $data = SeekerProfile::where('candidate_id', auth('candidate')->user()->id)->paginate(10);
            $maJor = Major::all();
            return view('client.upcv.upcv', compact('data', 'maJor'));
        }
        return redirect()->route('candidate.login');
    }
    public function store(Upcv $request)
    {
        $rules = [
            'path_cv' => 'required|mimes:pdf,doc,docx|max:2048',
        ];
        $message = [
            'path_cv.required' => 'Không được bỏ trống',
            'path_cv.mimes' => 'Vui lòng tải lên file pdf hoặc docs',
            'path_cv.max' => 'Vui lòng tải lên file không quá 2mb',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('seeker')->withErrors($validator);
        }
        $candidate_id = auth('candidate')->user()->id;
        $seeker = new SeekerProfile();
        $seeker->candidate_id = $candidate_id;
        $check_count = SeekerProfile::where('candidate_id', $candidate_id)->count();
        if($check_count >= 3) {
            Session::flash('error', 'Bạn đã đạt giới hạn 3 CV !');
            return redirect()->route('seeker');
        }else {
            $seeker->candidate_id = auth('candidate')->user()->id;
            $seeker->name = auth('candidate')->user()->name;
            $seeker->email = auth('candidate')->user()->email;
            $seeker->phone = auth('candidate')->user()->phone;
            $get_pdf = $request->file('path_cv');
            $path_pdf = 'upload/cv';
            if ($get_pdf) {
                $get_name_pdf = $get_pdf->getClientOriginalName();
                $name_pdf = current(explode('.', $get_name_pdf));
                $new_pdf = $name_pdf . rand(0, 99) . '.' . $get_pdf->getClientOriginalExtension();
                $get_pdf->move($path_pdf, $new_pdf);
                $seeker->path_cv = $new_pdf;
            }
            $seeker->save();
        }
        return redirect('seeker')->with('success', 'Thêm Thành Công');
    }
    public function destroy($id)
    {
        $seeker = SeekerProfile::find($id);
        if(isset($seeker->path_cv)){
            $file_path = public_path('upload/cv/' . $seeker->path_cv);
            if (is_file($file_path)) {
                unlink($file_path);
            }
        }
        if(isset($seeker)){
            $seeker->delete();
        }
        return redirect('seeker')->with('success', 'Xóa Thành Công');
    }

    public function activeCV($idsee) {
        $id = auth('candidate')->user()->id;
        $get_all_seeker = SeekerProfile::where('candidate_id', $id)->where('is_active', 1)->first();
        if(isset($get_all_seeker->is_active)) {
            $get_all_seeker->is_active = 0;
            $get_all_seeker->save();
        }

        $seeker_up = SeekerProfile::find($idsee);
        $seeker_up->is_active = 1;
        $seeker_up->save();
        return redirect('seeker')->with('success', 'Cập nhật Thành Công');
    }

    public function unActiveCV($idsee) {
        $seeker_up = SeekerProfile::find($idsee);
        if(isset($seeker_up->is_active)) {
            $seeker_up->is_active = 0;
            $seeker_up->save();
        }
        return redirect('seeker')->with('success', 'Cập nhật Thành Công');
    }
}
