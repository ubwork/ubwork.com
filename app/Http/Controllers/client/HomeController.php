<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Major;
use App\Models\Shortlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $count = [];
        $job_short = [];
        $data = JobPost::where('status', 1)->take(6)->get();
        $total = JobPost::all();
        $data_job_type = Major::all();
        foreach ($data_job_type as $item) {
            if (!empty($item)) {
                $count[$item->id] = JobPost::where('major_id', $item->id)->count();
            } else {
                $count[$item->id] = 0;
            }
        }
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $job_short = [];
            $data_short = Shortlist::where('candidate_id', $id)->take(6)->get();
            if (!empty($data_short)) {
                foreach ($data_short as $item) {
                    $id_post = $item->job_post_id;
                    $job_short[$id_post] = JobPost::where('id', $id_post)->first();
                }
            }
        }
        $maJor = Major::all();
        // dd($data->company->id);
        // dd(company::all());
        return view('client.home', compact('data', 'data_job_type', 'count', 'job_short', 'maJor', 'total'));
    }
}
