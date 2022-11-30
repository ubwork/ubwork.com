<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Education;
use App\Models\Major;
use App\Models\Experience;
use App\Models\JobPostActivities;
use App\Models\OpenCv;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterCvController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
        $this->v['activeRoute'] = 'filter';
    }
    public function index(Request $request)
    {
        $this->v['title'] = 'Tìm kiếm ứng viên phù hợp';
        $company_id = auth('company')->user()->id;
        $this->v['company'] = Company::find($company_id);

        $data = DB::table('job_post_activities')->where('company_id', $company_id)->select('seeker_id')->groupby('seeker_id')->pluck('seeker_id')->toArray();
        $this->v['seekerProfile'] = SeekerProfile::whereNotIn('id',$data)->paginate(5);
                                 

        $this->v['major'] = Major::all();
        $this->v['skill'] = Skill::all();
        if(!empty($this->v['seekerProfile'])){
            foreach($this->v['seekerProfile'] as $item) {
                $this->v['getCandidate'][$item->candidate_id] = Candidate::where('id', $item->candidate_id)->first();
            }
        }
        return view('company.filter-cv.index', $this->v);

    }

}
