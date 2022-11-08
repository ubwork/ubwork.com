<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\JobPostActivities;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;

class JobPostActivitiesController extends Controller
{
    public function applied(Request $request, $id)
    {
        $seeker = SeekerProfile::where('id', 1)->first();
        $seeker_id = $seeker->id;
        $applied = new JobPostActivities();
        $applied->job_post_id = $request->id;
        $applied->seeker_id = $seeker_id;
        $applied->is_see = '1';
        $applied->save();
        return back();
    }
    public function applied_jobs($id)
    {
        $job_applied = [];
        $data = JobPostActivities::where('seeker_id', $id)->take(6)->get();
        if (!empty($data)) {
            foreach ($data as $item) {
                $id_post = $item->job_post_id;
                $job_applied[$id_post] = job::where('id', $id_post)->first();
            }
        }
        return view('client.candidate.applied-job', compact('data', 'job_applied'));
    }
    public function destroy($id)
    {
        JobPostActivities::destroy($id);
        return back();
    }
}
