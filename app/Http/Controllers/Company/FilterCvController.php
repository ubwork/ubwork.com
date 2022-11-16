<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Major;
use App\Models\Experience;
use App\Models\SeekerProfile;
use App\Models\Skill;
use Illuminate\Http\Request;

class FilterCvController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $perPage = intval($request->input('page_num', 10));
        $query = "1=1";
        $exp      = $request->input('experience');
        $major      = $request->input('major');
        $skill      = $request->input('skill');
        if($exp) $query .= ' AND id = '. $exp ; 
        if($major) $query .= ' AND major_id = '. $major;
        if($skill) $query .= ' AND skill_id LIKE \'%'. $skill . '%\'' ;
        // dd($query);
        
        $title = "Tìm hồ sơ ứng viên";
        $activeRoute = "filter";
        $exp = Experience::all()->toArray();
        $major = Major::all()->toArray();
        $skill = Skill::all()->toArray();
        
        $candidate = Candidate::all();
        $data = SeekerProfile::with('candidate', 'major')->whereRaw($query)->paginate($perPage);
        // dd($data[$candidate->id]);
        return view('company.filter-cv.index', compact('title', 'activeRoute', 'major','exp', 'skill', 'data', 'candidate'));

    }

}
