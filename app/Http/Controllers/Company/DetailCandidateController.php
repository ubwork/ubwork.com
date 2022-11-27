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
        $data  =  SeekerProfile::with('major', 'skill', 'candidate')->where('candidate_id', $id)->first();

        $title = "Thông tin ứng viên";
        $activeRoute = "Profile";
        $maJor  = Major::all();
        $education = Education::where('seeker_id', $data->id)->get()->toArray();

        $exp = Experience::where('seeker_id', $data->id)->get()->toArray();
        return view('company.detail-candidate.index', compact('title', 'activeRoute', 'maJor', 'data', 'education', 'exp'));
    }

}
