<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobPostActivities;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageCVController extends Controller
{
    private $v;
    public function __construct(){
        $this->v = [];
        $this->v['activeRoute'] = 'manage-cv';
    }

    public function index(Request $request) {
        $this->v['title'] = 'Quản lý CV';
        $this->v['major'] = Major::all();
        $this->v['skill'] = Skill::all();
        $company_id = auth('company')->user()->id;
        if($request->ajax() && !empty($request->get('is_see')) && $request->get('is_see') != -1){
            $this->v['listCV'] = JobPostActivities::with('seeker_profile')
                            ->where('company_id',$company_id)
                            ->where('is_see',$request->get('is_see'))
                            ->groupby('seeker_id')
                            ->select(['seeker_id'])
                            ->paginate(10);
        }else{
            $this->v['listCV'] = JobPostActivities::with('seeker_profile')
                                ->where('company_id',$company_id)
                                // ->where('is_see',1)
                                ->groupby('seeker_id')
                                ->select(['seeker_id'])
                                ->paginate(10);
        }
        if (!empty($this->v['listCV'] )) {
            foreach ($this->v['listCV']  as $item) {
                $seeker_id = $item->seeker_id;    
                $this->v['list_skill'][$seeker_id] = SkillSeeker::where('seeker_id', $seeker_id)->get();
            }
        }
        if ($request->ajax()) {
            return view('company.manage-cv.selectView',$this->v);
        }
        return view('company.manage-cv.index',$this->v);
    }
    
    public function selectView(Request $request) {
        $this->v['title'] = 'Quản lý CV';
        $this->v['major'] = Major::all();
        $this->v['skill'] = Skill::all();
        $id = $request->id;
        $company_id = auth('company')->user()->id;
        if($id == -1) {
            $query = '-1';
            $sk = '!=';
        }else {
            $query = $id;
            $sk = '=';
        }
        // dd($query);
        $this->v['listCV'] = DB::table('job_post_activities')
                            ->select(DB::raw('*, ROW_NUMBER() OVER (PARTITION BY seeker_id) as row_no'))
                            ->where('company_id', $company_id)
                            ->where('is_see',$sk ,$query)
                            ->groupBy('seeker_id','id','is_see','company_id','job_post_id','created_at','updated_at','time','is_function')
                            ->paginate(100);
                            
        if (!empty($this->v['listCV'] )) {
            foreach ($this->v['listCV']  as $item) {
                $seeker_id = $item->seeker_id;
                $this->v['getSeeker'][$seeker_id] = SeekerProfile::where('id', $seeker_id)->first();

                $this->v['list_skill'][$seeker_id] = SkillSeeker::where('seeker_id', $seeker_id)->get();
            }
        }
        return view('company.manage-cv.selectView',$this->v);
    }
}
