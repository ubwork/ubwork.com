<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\JobPost;
use App\Models\JobSkill;
use App\Models\Major;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data = JobPost::where('status', 1)->get();
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data'));
    }
    public function job()
    {
        $data = JobPost::where('status', 1)->get();
        return view('client.job.job', compact('data'));
    }
    public function job_cat($id)
    {
        $job_cat = Major::where('id', $id)->first();
        $data = JobPost::where('major_id', $id)->get();
        return view('client.job.job-cat', compact('data', 'job_cat'));
    }
    public function detail($id)
    {
        $data_job = JobPost::where('id', $id)->first();
        $data_job_relate = JobPost::where('job_type_id', $data_job->job_type_id)->take(3)->get();
        return view('client.job.job-detail', compact('data_job', 'data_job_relate', 'job_skills'));
    }
}
