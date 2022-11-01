<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $data = job::where('status', 1)->get();
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data'));
    }
    public function job(){
        $data = job::where('status', 1)->get();
        return view('client.job.job', compact('data'));
    }
}
