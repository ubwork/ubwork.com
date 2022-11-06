<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\Job_post_activities;
use App\Models\Seeker_profile;
use Illuminate\Http\Request;

class Job_post_activitiesController extends Controller
{
    public function applied(Request $request, $id)
    {
        $seeker = Seeker_profile::where('id', 1)->first();
        $seeker_id = $seeker->id;
        $applied = new Job_post_activities();
        $applied->job_post_id = $request->id;
        $applied->seeker_id = $seeker_id;
        $applied->is_see = '1';
        $applied->save();
        return back();
    }
    public function applied_jobs($id)
    {
        $data = Job_post_activities::where('seeker_id', $id)->take(6)->get();
        foreach ($data as $item) {
            $id_post = $item->job_post_id;
            $job_applied[$id_post] = job::where('id', $id_post)->first();
        }
        return view('client.candidate.applied-job', compact('data', 'job_applied'));
    }
    public function destroy($id)
    {
        Job_post_activities::destroy($id);
        return back();
    }
}
