<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HistoryPayment;
use App\Models\JobPostActivities;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\SkillSeeker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailCandidateController extends Controller
{

    public function index(Request $request, $id)
    {
        $company_id = auth('company')->user()->id;
        $data  =  SeekerProfile::with('major', 'skill', 'candidate')->where('candidate_id', $id)->first();

        $check = JobPostActivities::where([
            ['company_id','=',$company_id],
            ['seeker_id','=', $data->id],
            ])->get()->count();

        if($check == 0) {
            return redirect()->route('company.detail-profile.hidden', ['id' => $id]);
        }

        $title = "Thông tin ứng viên";
        $activeRoute = "Profile";
        $maJor  = Major::all();
        $education = Education::where('seeker_id', $data->id)->get()->toArray();
        $seekerSkill = SkillSeeker::where('seeker_id', $data->id)->get();
        $certificate = Certificate::where('seeker_id', $data->id)->get();
        $timeNow = Carbon::now();
        $exp = Experience::where('seeker_id', $data->id)->get()->toArray();
        return view('company.detail-candidate.index', compact('title', 'activeRoute', 'maJor', 'data', 'education', 'exp', 'seekerSkill','timeNow','certificate'));
    }

    public function viewHidden(Request $request, $id) {
        $company_id = auth('company')->user()->id;
        $data  =  SeekerProfile::with('major', 'skill', 'candidate')->where('candidate_id', $id)->first();
        $check = JobPostActivities::where([
                ['company_id','=',$company_id],
                ['seeker_id','=', $data->id],
                ['is_function','=',2]
            ])->get()->count();
        if($check > 0) {
            return redirect()->route('company.detail-candidate.index', ['id' => $id]);
        }
        if ($request->ajax()) {
            
            $idseeker =  $request->get('idseeker');
            $coin = $request->get('coin');
            $company = Company::where('id', $company_id)->first();
            if($company->coin < $coin){
                return response()->json([
                    'success'=> false,
                    'message' => 'Số dư không đủ, vui lòng nạp thêm!'
                ]);
            }else {
                $company->coin = $company->coin - $coin;
                $company->save();

                $history = new HistoryPayment();
                $history->user_id = $company_id;
                $history->note = "Thực hiện mua ứng viên - ".$coin." coin số dư còn lại ".$company->coin." coin";
                $history->coin = $coin;
                $history->type_coin = 0;
                $history->type_account = 0;
                $history->created_at = Carbon::now()->toDateTimeString();
                $history->updated_at = Carbon::now()->toDateTimeString();
                
                $history->save();

                $job_activity = new JobPostActivities();
                $job_activity->seeker_id = $idseeker;
                $job_activity->is_see = 1;
                $job_activity->company_id = $company_id;
                $job_activity->is_function = 2;
                $job_activity->created_at = Carbon::now()->toDateTimeString();
                $job_activity->updated_at = Carbon::now()->toDateTimeString();
                $job_activity->save();
            
                return response()->json([
                    'success'=> true,
                    'message' => 'Mở khóa thành công!',
                    'nameSeeker' => $data->name
                ]);
            }
        }

        $title = "Thông tin ứng viên";
        $activeRoute = "Profile";
        $maJor  = Major::all();
        $education = Education::where('seeker_id', $data->id)->get()->toArray();
        $seekerSkill = SkillSeeker::where('seeker_id', $data->id)->get();
        $certificate = Certificate::where('seeker_id', $data->id)->get();
        $timeNow = Carbon::now();
        $exp = Experience::where('seeker_id', $data->id)->get()->toArray();
        return view('company.detail-candidate.viewHidden', compact('title', 'activeRoute', 'maJor', 'data', 'education', 'exp', 'seekerSkill','timeNow','certificate'));
    }

}
