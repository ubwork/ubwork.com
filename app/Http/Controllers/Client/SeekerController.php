<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\Upcv;
use App\Models\Major;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SeekerController extends Controller
{
    public function index()
    {
        $data = SeekerProfile::where('candidate_id', auth('candidate')->user()->id)->paginate(2);
        $maJor = Major::all();
        return view('client.upcv.upcv', compact('data', 'maJor'));
    }
    public function store(Upcv $request)
    {
        $request->validate([
            'path_cv' => 'required'
        ]);
        $seeker = new SeekerProfile;
        $data = SeekerProfile::where('candidate_id', auth('candidate')->user()->id)->first();
        if (!empty($data)) {
            $get_pdf = $request->file('path_cv');
            $path_pdf = 'upload/cv';
            if ($request->hasFile('path_cv')) {
                $get_name_pdf = $get_pdf->getClientOriginalName();
                $name_pdf = current(explode('.', $get_name_pdf));
                $new_pdf = $name_pdf . rand(0, 99) . '.' . $get_pdf->getClientOriginalExtension();
                $get_pdf->move($path_pdf, $new_pdf);
            }
            $file_path = public_path('upload/cv/' . $data->path_cv);
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->update([
                'path_cv' => $new_pdf,
            ]);
        } else {
            $seeker->candidate_id = auth('candidate')->user()->id;
            $seeker->name = $request->name;
            $seeker->position_candidate = $request->position_candidate;
            $seeker->major_id = $request->major_id;
            $seeker->description = $request->description;
            $get_pdf = $request->file('path_cv');
            $path_pdf = 'upload/cv';
            if ($get_pdf) {
                $get_name_pdf = $get_pdf->getClientOriginalName();
                $name_pdf = current(explode('.', $get_name_pdf));
                $new_pdf = $name_pdf . rand(0, 99) . '.' . $get_pdf->getClientOriginalExtension();
                $get_pdf->move($path_pdf, $new_pdf);
                $seeker->path_cv = $new_pdf;
            }
            $seeker->email = $request->email;
            $seeker->phone = $request->phone;
            $seeker->save();
        }
        return redirect('seeker')->with('success', 'Thêm Thành Công');
    }
    public function destroy($id)
    {
        $seeker = SeekerProfile::find($id);
        $file_path = public_path('upload/cv/' . $seeker->path_cv);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $seeker->path_cv = "";
        $seeker->save();
        return redirect('seeker');
    }
}
