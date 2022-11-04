<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\job;
use App\Models\Job_type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $arr = [];
        $data = job::where('status', 1)->take(6)->get();
        $job_type = Job_type::all();

        // foreach ($job_type as $item) {
        //     $id = $item->id;
        //     $count[$id] = job::where('job_type_id', $id)->count();
        // }
        // dd(company::all());
        return view('client.home', compact('data', 'job_type'));
    }
}
