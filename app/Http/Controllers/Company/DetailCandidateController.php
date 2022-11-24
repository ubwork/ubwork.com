<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Major;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;

class DetailCandidateController extends Controller
{
    public function index(Request $request, $id)
    {
        $data  =  SeekerProfile::where('candidate_id', $id)->first();
        $can = Candidate::where('id',$data->candidate_id)->first();

        $title = "Thông tin ứng viên";
        $activeRoute = "Profile";
        $maJor  = Major::all();
        $education = Education::where('seeker_id', $data->id)->get()->toArray();

        $exp = Experience::where('seeker_id', $data->id)->get()->toArray();
        return view('company.detail-candidate.index', compact('title', 'activeRoute', 'maJor', 'data', 'education', 'exp', 'can'));
    }
    public function feedback($id)
    {
        // $company_detail = company::where('id', $id)->first();
        // $company_job = JobPost::where('company_id', $company_detail->id)->get();
        // $maJor = Major::all();
        return view('company.detail-candidate.feedback', compact('maJor'));
    }
}
