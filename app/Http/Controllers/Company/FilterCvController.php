<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Major;
use App\Models\Experience;
use App\Models\OpenCv;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillSeeker;
use Illuminate\Http\Request;

class FilterCvController extends Controller
{
    public function index(Request $request)
    {
        $perPage = intval($request->input('page_num', 10));
        $query = "1=1";
        $exp      = $request->input('experience');
        $major      = $request->input('major');
        $skills      = $request->input('skill');
        if($major && $major <> -1) $query .= ' AND major_id = '. $major;
        if($exp && $exp <> -1)
        {
            $exp = Experience::where('id',$exp)->pluck('seeker_id','seeker_id')->toArray();
            $cvString = !empty($exp) ? implode(',',$exp) : -1;
            $query .= " AND id IN($cvString)" ;
        }
        if($skills && $skills <> -1)
        {
            $seekerSkill = SkillSeeker::where('skill_id',$skills)->pluck('seeker_id','seeker_id')->toArray();
            $cvString = !empty($seekerSkill) ? implode(',',$seekerSkill) : -1;
            $query .= " AND id IN($cvString)" ;
        }

        $allProfile = SeekerProfile::get()->keyBy('candidate_id')->toArray();
        $title = "Tìm hồ sơ ứng viên";
        $activeRoute = "filter";
        $exp = Experience::all()->toArray();
        $major = Major::all()->toArray();
        $skill = Skill::all()->toArray();


        $company = Company::find(auth('company')->user()->id);
        $candidate = Candidate::all();
        $data = SeekerProfile::with('candidate', 'major')->whereRaw($query)->paginate($perPage);


        return view('company.filter-cv.index', compact('title', 'activeRoute', 'major','exp', 'skill',
        'data', 'candidate', 'company'));
        $data = Candidate::with('seeker', 'major')->whereRaw($query)->paginate($perPage);
        return view('company.filter-cv.index', compact('title', 'activeRoute', 'major','exp', 'skill',
        'data', 'candidate', 'company', 'allProfile'));

    }

}
