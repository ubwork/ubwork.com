<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\JobPost;
use App\Models\JobPostActivities;
use App\Models\Major;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;

class JobPostActivitiesController extends Controller
{
    public function applied(Request $request, $id)
    {
        $id_user = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
        $seeker_id = $seeker->id;
        $applied = new JobPostActivities();
        $applied->job_post_id = $id;
        $applied->seeker_id = $seeker_id;
        $applied->is_see = '1';
        $applied->save();
        return back();
    }

    public function jobApply()
    {
        $id_user = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
        $data = [];
        $job_applied = [];
        if (!empty($seeker)) {
            $job_applied = [];
            $data = JobPostActivities::where('seeker_id', $seeker->id)->get();
            if (!empty($data)) {
                foreach ($data as $item) {
                    $id_post = $item->job_post_id;
                    $job_applied[$id_post] = JobPost::where('id', $id_post)->first();
                }
            }
        }
        $maJor = Major::all();
        return view('client.candidate.applied-job', compact('data', 'job_applied', 'maJor'));
    }
    public function destroy($id)
    {
        JobPostActivities::destroy($id);
        return back();
    }
}