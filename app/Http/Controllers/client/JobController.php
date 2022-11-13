<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\JobPost;
use App\Models\JobPostActivities;
use App\Models\JobSkill;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Shortlist;
use App\Models\Shortlisted;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data = JobPost::where('status', 1)->get();
        // dd($data->company->id);
        // dd(company::all());
        $maJor = Major::all();
        return view('client.home', compact('data', 'maJor'));
    }
    public function job()
    {
        $data = JobPost::where('status', 1)->paginate(1);
        $maJor = Major::all();
        return view('client.job.job', compact('data', 'maJor'));
    }
    public function job_cat($id)
    {
        $job_cat = Major::where('id', $id)->first();
        $data = JobPost::where('major_id', $id)->paginate(1);
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
        if (auth('candidate')->check()) {
            $id_user = auth('candidate')->user()->id;
            $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
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
            // dd($idJobApplied[$item->id]);
            // dd($data_job->id);
        }
        $total = JobPost::all();
        $data_job_relate = JobPost::where('major_id', $data_job->major_id)->take(3)->get();
        return view('client.job.job-detail', compact('data_job', 'data_job_relate', 'maJor', 'idJobApplied', 'idJobShort', 'total'));
    }
}
