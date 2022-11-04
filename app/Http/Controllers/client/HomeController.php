<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\Job_type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = job::where('status', 1)->take(6)->get();
        $data_job_type = Job_type::all();
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data', 'data_job_type'));
    }
}
