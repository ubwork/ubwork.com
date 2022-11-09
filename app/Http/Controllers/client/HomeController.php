<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\JobType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = [];
        $data = job::where('status', 1)->take(6)->get();
        $data_job_type = JobType::all();
        foreach ($data_job_type as $item) {
            if (!empty($item)) {
                $count[$item->id] = job::where('job_type_id', $item->id)->count();
            } else {
                $count[$item->id] = 0;
            }
        }
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data', 'data_job_type', 'count'));
    }
}
