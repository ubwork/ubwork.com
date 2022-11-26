<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Education;
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
        $gender      = $request->input('gender');
        $education      = trim($request->input('name_education'));
        

        if($major && $major <> -1) 
        {
            $major = SeekerProfile::where('major_id', $major)->pluck('candidate_id', 'candidate_id')->toArray();
            $cvString = !empty($major) ? implode(',',$major) : -1;
            $query .= " AND id IN($cvString)" ;
        }
        
        if($gender && $gender <> -1) $query .= ' AND gender = '. $gender;
        if($education && $education <> '' )
        {
            $education = Education::where('name_education', 'like', '%'. $education .'%' )->pluck('seeker_id','seeker_id')->toArray();
            $nameEducation = SeekerProfile::whereIN('id', $education)->pluck('candidate_id','candidate_id')->toArray();
            $cvString = !empty($nameEducation) ? implode(',',$nameEducation) : -1;
            $query .= " AND id IN($cvString)" ;
        }
        if($exp && $exp <> -1)
        {
            $exp = Experience::where('id',$exp)->pluck('seeker_id','seeker_id')->toArray();
            $exps = SeekerProfile::whereIN('id', $exp)->pluck('candidate_id','candidate_id')->toArray();
            $cvString = !empty($exps) ? implode(',',$exps) : -1;
            $query .= " AND id IN($cvString)" ;
        }
        if($skills && $skills <> -1)
        {
            $seekerSkill = SkillSeeker::where('skill_id',$skills)->pluck('seeker_id','seeker_id')->toArray();
            $seekerSkills = SeekerProfile::whereIN('id', $seekerSkill)->pluck('candidate_id','candidate_id')->toArray();
            $cvString = !empty($seekerSkills) ? implode(',',$seekerSkills) : -1;
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
        $data = Candidate::with('seeker', 'major')->whereRaw($query)->paginate($perPage);
        return view('company.filter-cv.index', compact('title', 'activeRoute', 'major','exp', 'skill', 
        'data', 'candidate', 'company', 'allProfile'));

    }

}
