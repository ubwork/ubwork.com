<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;

class SeekerController extends Controller
{
    public function index()
    {   $data = SeekerProfile::where('candidate_id', auth('candidate')->user()->id)->paginate(2);
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
            $new_pdf = time() . '.' . $get_pdf->getClientOriginalExtension();
            $get_pdf->move($path_pdf, $new_pdf);
            $seeker->path_cv = $new_pdf;
        }
        $seeker->email = $request->email;
        $seeker->phone = $request->phone;
        // dd($seeker);
        $seeker->save();
        return redirect('seeker');
    }
}
