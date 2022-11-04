<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\job;
use App\Models\Job_skill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data = job::where('status', 1)->get();
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data'));
    }
    public function job()
    {
        $data = job::where('status', 1)->get();
        return view('client.job.job', compact('data'));
    }
    public function detail($id)
    {
        $data_job = job::where('id', $id)->first();
        $data_job_relate = job::where('job_type_id', $data_job->job_type_id)->take(3)->get();
        $job_skills = Job_skill::where('job_post_id', $id)->get();
        return view('client.job.job-detail', compact('data_job', 'data_job_relate', 'job_skills'));
    }
}
