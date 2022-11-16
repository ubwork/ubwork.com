<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
            $data = JobPost::Orderby('title', 'DESC')->select('*')->paginate(10);
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
        return view('client.home', compact('data', 'data_job_type', 'count', 'job_short', 'maJor'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $major = $request->major;

        $maJor = Major::all();
        if (isset($search) && isset($major)) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        }elseif(isset($search) && $major == null){
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->paginate(10);
        }elseif($search == null && isset($major)){
            $data = JobPost::where('status', 1)->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        } else {
            $data = JobPost::where('status', 1)->get();
        }
        return view('client.job.job', compact('data', 'maJor'));
    }
}
