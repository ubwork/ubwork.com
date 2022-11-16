<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\Major;
use App\Models\Shortlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $count = [];
        $job_short = [];
        $data_job_type = Major::all();
        $dataYour = [];
        $job_short = [];
        // dd(isset($search));
        $search = $request->search;
        if (isset($search)) {
            $data = JobPost::Orderby('title', 'DESC')->select('*')->where('title', 'like', '%' . $search . '%')->paginate(1);
        } else {
            $data = JobPost::all()->random(1);
        }
        foreach ($data_job_type as $item) {
            if (!empty($item)) {
                $count[$item->id] = JobPost::where('major_id', $item->id)->count();
            } else {
                $count[$item->id] = 0;
            }
        }
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $dataUser = Candidate::where('id', $id)->first();
            $data_short = Shortlist::where('candidate_id', $id)->get();
            if (!empty($data_short)) {
                foreach ($data_short as $item) {
                    $id_post = $item->job_post_id;
                    $job_short[$id_post] = $item;
                }
            }
            if (!empty($dataUser)) {
                $maJor_id = $dataUser->major_id;
                $dataYour = JobPost::where('major_id', $maJor_id)->get();
            }
        }
        $maJor = Major::all();
        return view('client.home', compact('data', 'data_job_type', 'count', 'job_short', 'maJor', 'dataYour'));
    }
}
