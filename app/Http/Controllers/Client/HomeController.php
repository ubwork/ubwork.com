<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobPostActives;
use App\Models\JobPostActivities;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Shortlist;
use App\Models\Skill;
use App\Models\SkillPost;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // if ($this->check_isMobile()) {
        //     abort(415);
        //     $title = '';
        //     $code = '';
        //     $message = '';
        //     return response()->view('errors.999',compact('title','code','message'));
        // }
        $count = [];
        $job_short = [];
        $data_job_type = Major::paginate(6);
        $dataYour = [];
        $job_short = [];
        $data = [];
        $seeker = [];
        $countCandidate = [];
        $user = Candidate::where('status', 1)->get();
        $user_type = Candidate::where('status', 1)->where('type', 1)->get();
        $company = Company::where('status', 1)->get();
        $job_post = JobPost::where('status', 1)->get();
        $search = $request->search;
        if (isset($search)) {
            $data = JobPost::Orderby('title', 'DESC')->select('*')->where('title', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $data = JobPost::withCount('activities')->orderBy('activities_count','DESC')->inRandomOrder()->where('status', 1)->limit(6)->get();
        }
        foreach ($data_job_type as $item) {
            if (!empty($item)) {
                $count[$item->id] = JobPost::where('major_id', $item->id)->where('status', 1)->count();
            } else {
                $count[$item->id] = 0;
            }
        }
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $dataUser = Candidate::where('id', $id)->first();
            $data_short = Shortlist::where('candidate_id', $id)->get();
            if (!empty($data_short)) {
                foreach ($data_short as $item) {
                    $id_post = $item->job_post_id;
                    $job_short[$id_post] = $item;
                }
            }
            $seeker = SeekerProfile::where('candidate_id', $id)->first();
            if (!empty($seeker)) {
                $dataYour = JobPost::where('major_id', $seeker->major_id)->where('status', 1)->get();
            }
        }
        $maJor = Major::all();
        $countCandidate = Candidate::all()->count();
        $countJob = JobPost::all()->count();
        $countJobActive = JobPostActivities::all()->count();
        return view('client.home', compact('data', 'data_job_type', 'count', 'job_short', 'maJor', 'dataYour', 'countCandidate', 'countJob', 'countJobActive', 'user', 'company', 'seeker', 'job_post', 'user_type'));
    }
    public function search(Request $request)
    {
        $today = strtotime(Carbon::now());
        $maJor = Major::all();
        $Skill = Skill::all();
        $data = SkillPost::join('job_posts', 'skill_posts.post_id', '=', 'job_posts.id')
            ->join('skills', 'skill_posts.skill_id', '=', 'skills.id')
            ->where('status', 1)
            ->where(function ($q) use ($request) {
                if (!empty($request->search)) {
                    $q->orwhere('job_posts.title', 'LIKE', '%' . $request->search . '%');
                }
                if (!empty($request->major)) {
                    $q->where('job_posts.major_id', '=', $request->major);
                }
                if (!empty($request->type)) {
                    $q->where('job_posts.type_work', '=', $request->type);
                }
                if (!empty($request->skill)) {
                    $q->where('skills.id', '=', $request->skill);
                }
            })
            ->select('job_posts.*')
            ->paginate(10);
        return view('client.job.job', compact('data', 'maJor', 'today', 'Skill'));
    }
    public function searchByTitle(Request $request)
    {
        $job = JobPost::where('title', 'like', '%' . $request->value . '%')->get();
        return response()->json($job);
    }

    public function choose() {
        $maJor = Major::all();
        return view('client.choose', compact('maJor'));
    } 
    public function check_isMobile() {
        $is_mobile = '0';
        if(preg_match('/(android|iphone|ipad|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
        $is_mobile=1;
        if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']))))
        $is_mobile=1;
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
        
        if(in_array($mobile_ua,$mobile_agents))
        $is_mobile=1;
        
        if (isset($_SERVER['ALL_HTTP'])) {
        if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0)
        $is_mobile=1;
        }
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0)
        $is_mobile=0;
        return $is_mobile;
        }
}
