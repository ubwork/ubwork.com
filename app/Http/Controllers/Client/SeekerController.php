<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SeekerController extends Controller
{
    public function index()
    {
        $data = SeekerProfile::where('candidate_id', auth('candidate')->user()->id)->paginate(2);
        // dd($data);
        return view('client.upcv.cv', compact('data'));
    }
    public function store(Request $request)
    {
        $seeker = new SeekerProfile;
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
        // dd($seeker);
        $seeker->save();
        return redirect('seeker');
    }
    public function destroy($id)
    {
        $seeker = SeekerProfile::find($id);
        $file_path = public_path('upload/cv/'.$seeker->path_cv);
        // dd($file_path);
        // dd($file_path);
        if(is_file($file_path)){
            unlink($file_path);
        }
        $seeker->delete();
        return redirect('seeker');
    }
}
