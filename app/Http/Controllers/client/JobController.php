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
    public function list()
    {
        $job_list = job::paginate();
        return view('client.job.job', compact('job_list'));
    }
    public function show($id)
    {
        $job_detail = job::where('id', $id)->first();
        $job = job::where('jop_type_id', $job_detail->id)->take(3)->get();
        $job_skills = Job_skill::where('job_post_id', $id)->get();
        return view('client.job.job_detail', compact('job_detail', 'job', 'job_skills'));
    }
    public function cat($id)
    {
        $job_cat = job::where('jop_type_id', $id)->get();
        return view('client.job.job_cat', compact('job_cat'));
    }
}
