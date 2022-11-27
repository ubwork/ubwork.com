<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Shortlist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $count = [];
        $job_short = [];
        $data_job_type = Major::all();
        $dataYour = [];
        $job_short = [];
        $data = [];
        $seeker = [];
        // dd(isset($search));
        $search = $request->search;
        if (isset($search)) {
            $data = JobPost::Orderby('title', 'DESC')->select('*')->where('title', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $data = JobPost::inRandomOrder()->where('status', 1)->limit(5)->get();
        }
        foreach ($data_job_type as $item) {
            if (!empty($item)) {
                $count[$item->id] = JobPost::where('major_id', $item->id)->where('status', 1)->count();
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
                $seeker = SeekerProfile::where('candidate_id', $id)->first();
                if (!empty($seeker)) {
                    $dataYour = JobPost::where('major_id', $seeker->maJor_id)->where('status', 1)->get();
                }
            }
        }
        $maJor = Major::all();
        return view('client.home', compact('data', 'data_job_type', 'count', 'job_short', 'maJor', 'dataYour'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $major = $request->major;
        $today = strtotime(Carbon::now());
        $maJor = Major::all();
        if (isset($search) && isset($major)) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        } elseif (isset($search) && $major == null) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->paginate(10);
        } elseif ($search == null && isset($major)) {
            $data = JobPost::where('status', 1)->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        } else {
            $data = JobPost::where('status', 1)->get();
        }
        return view('client.job.job', compact('data', 'maJor', 'today'));
    }
    public function searchByTitle(Request $request)
    {
        $job = JobPost::where('title', 'like', '%' . $request->value . '%')->get();
        return response()->json($job);
    }

    public function choose() {
        $maJor = Major::all();
        return view('client.choose', compact('maJor'));
    } 
}
