<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\company;
use App\Models\JobPost;
use App\Models\JobPostActivities;
use App\Models\JobSkill;
use App\Models\JobSpeed;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Shortlist;
use App\Models\Shortlisted;
use App\Models\Skill;
use App\Models\SkillPost;
use Illuminate\Http\Request;
use Carbon\Carbon;


class JobController extends Controller
{
    public function index()
    {
        $data = JobPost::where('status', 1)->get();
        $maJor = Major::all();
        return view('client.home', compact('data', 'maJor'));
    }
    public function job()
    {
        $job_short = [];
        $jobspeed = [];
        $Skill = Skill::all();
        $data = JobPost::where('status', 1)->paginate(10);
        $today = strtotime(Carbon::now());
        $maJor = Major::all();
        $date = date('Y/m/d', time());
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $jobspeed = JobPostActivities::where('seeker_id', $id)->whereDate('created_at', $date)->first();
            $dataUser = Candidate::where('id', $id)->first();
            $data_short = Shortlist::where('candidate_id', $id)->get();
            if (!empty($data_short)) {
                foreach ($data_short as $item) {
                    $id_post = $item->job_post_id;
                    $job_short[$id_post] = $item;
                }
            }
            return view('client.job.job', compact('data', 'maJor', 'job_short', 'today', 'jobspeed', 'Skill'));
        } else {
            return view('client.job.job', compact('data', 'maJor', 'job_short', 'today', 'jobspeed', 'Skill'));
        }
    }
    public function job_cat($id)
    {
        $job_cat = Major::where('id', $id)->first();
        $data = JobPost::where('major_id', $id)->where('status', 1)->paginate(10);
        $maJor = Major::all();
        return view('client.job.job-cat', compact('data', 'job_cat', 'maJor'));
    }
    public function detail($id)
    {
        $data_job = JobPost::where('id', $id)->first();
        $maJor = Major::all();
        $idJobApplied = [];
        $idJobShort = [];
        $data_job_relate = [];
        $seeker = [];
        if (auth('candidate')->check()) {
            $id_user = auth('candidate')->user()->id;
            $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
            if (!empty($seeker->id)) {
                $dataActive = JobPostActivities::where('seeker_id', $seeker->id)->get();
                if (!empty($dataActive)) {
                    foreach ($dataActive as $item) {
                        $idJobApplied[$item->job_post_id] = $item;
                    }
                }
                $dataShort = Shortlist::where('candidate_id', $id_user)->get();
                if (!empty($dataShort)) {
                    foreach ($dataShort as $item) {
                        $idJobShort[$item->job_post_id] = $item;
                    }
                }
            }
        }
        $data_job_relate = JobPost::where('major_id', $data_job->major_id)
            ->where('id', '!=', $data_job->id)->take(3)->get();

        return view('client.job.job-detail', compact(
            'data_job',
            'data_job_relate',
            'maJor',
            'idJobApplied',
            'idJobShort',
            'seeker'
        ));
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
            ->paginate(5);
        // return response()->json($data);
        return view('client.job.job', compact('data', 'maJor', 'today', 'Skill'));
    }
    public function searchs(Request $request)
    {
        $data = SkillPost::join('job_posts', 'skill_posts.post_id', '=', 'job_posts.id')
            ->join('skills', 'skill_posts.skill_id', '=', 'skills.id')
            ->where('status', 1)
            ->where(function ($q) use ($request) {
                $search = $request['searchText'];
                $major = $request['searchMajor'];
                $type = $request['searchType'];
                $skill = $request['searchSkill'];
                if (!empty($search)) {
                    $q->orwhere('job_posts.title', 'LIKE', '%' . $search . '%');
                }
                if (!empty($major)) {
                    $q->where('job_posts.major_id', '=', $major);
                }
                if (!empty($type)) {
                    $q->where('job_posts.type_work', '=', $type);
                }
                if (!empty($skill)) {
                    $q->where('skills.id', '=', $skill);
                }
            })
            ->select('job_posts.*')
            ->distinct()
            ->with(['company','major'])
            ->get();
            return response()->json($data);
    }
    public function searchByTitle($id, Request $request)
    {
        $job = JobPost::where('major_id', $id)->where('title', 'like', '%' . $request->value . '%')->get();
        return response()->json($job);
    }
}
