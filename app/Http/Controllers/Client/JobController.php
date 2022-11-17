<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\company;
use App\Models\JobPost;
use App\Models\JobPostActivities;
use App\Models\JobSkill;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Shortlist;
use App\Models\Shortlisted;
use Illuminate\Http\Request;
use Carbon\Carbon;


class JobController extends Controller
{
    public function index()
    {
        $data = JobPost::where('status', 1)->get();
        // dd($data->company->id);
        // dd(company::all());
        $maJor = Major::all();
        return view('client.home', compact('data', 'maJor'));
    }
    public function job()
    {
        $job_short = [];
        $data = JobPost::where('status', 1)->paginate(10);
        $today = strtotime(Carbon::now());
        $maJor = Major::all();
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
        }
        return view('client.job.job', compact('data', 'maJor', 'job_short', 'today'));
    }
    public function job_cat($id)
    {

        $job_cat = Major::where('id', $id)->first();
        $data = JobPost::where('major_id', $id)->where('status', 1)->paginate(10);

        $maJor = Major::all();
        return view('client.job.job-cat', compact('data', 'job_cat', 'maJor'));
    }
    public function detail($id)
    {
        $data_job = JobPost::where('id', $id)->first();
        $maJor = Major::all();
        $idJobApplied = [];
        $idJobShort = [];
        $data_job_relate = [];
        $seeker = [];
        if (auth('candidate')->check()) {
            $id_user = auth('candidate')->user()->id;
            $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
            if (!empty($seeker->id)) {
                $dataActive = JobPostActivities::where('seeker_id', $seeker->id)->get();
                if (!empty($dataActive)) {
                    foreach ($dataActive as $item) {
                        $idJobApplied[$item->job_post_id] = $item;
                    }
                }
                $dataShort = Shortlist::where('candidate_id', $id_user)->get();
                if (!empty($dataShort)) {
                    foreach ($dataShort as $item) {
                        $idJobShort[$item->job_post_id] = $item;
                    }
                }
            }
            // dd($idJobApplied[$item->id]);
            // dd($data_job->id);
        }
        $data_job_relate = JobPost::where('major_id', $data_job->major_id)
            ->where('id', '!=', $data_job->id)->take(3)->get();

        return view('client.job.job-detail', compact(
            'data_job',
            'data_job_relate',
            'maJor',
            'idJobApplied',
            'idJobShort',
            'seeker'
        ));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $major = $request->major;
        $type = $request->type;
        $today = strtotime(Carbon::now());
        $maJor = Major::all();
        if (isset($search) && isset($major) && isset($type)) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->where('major_id', 'like', '%' . $major . '%')->where('type_work', 'like', '%' . $type . '%')->paginate(10);
        } elseif (isset($search) && $major == null && $type == null) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->paginate(10);
        } elseif ($search == null && isset($major) && $type == null) {
            $data = JobPost::where('status', 1)->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        } elseif ($search == null && $major == null && isset($type)) {
            $data = JobPost::where('status', 1)->where('type_work', 'like', '%' . $type . '%')->paginate(10);
        } elseif (isset($search) && isset($major) && $type == null) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->where('major_id', 'like', '%' . $major . '%')->paginate(10);
        } elseif (isset($search) && $major == null && isset($type)) {
            $data = JobPost::where('status', 1)->where('title', 'like', '%' . $search . '%')->where('type_work', 'like', '%' . $type . '%')->paginate(10);
        } elseif ($search == null && isset($major) && isset($type)) {
            $data = JobPost::where('status', 1)->where('major_id', 'like', '%' . $major . '%')->where('type_work', 'like', '%' . $type . '%')->paginate(10);
        } else {
            $data = JobPost::where('status', 1)->get();
        }
        return view('client.job.job', compact('data', 'maJor', 'today'));
    }
}
