<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\Major;
use App\Models\Shortlist;
use Illuminate\Http\Request;

class ShortlistedController extends Controller
{

    public function shortlisted(Request $request, $id)
    {
        $id_user = auth('candidate')->user()->id;
        $shortlisted = new Shortlist;
        $shortlisted->job_post_id = $request->id;
        $shortlisted->candidate_id = $id_user;
        $shortlisted->save();
        return back();
    }
    public function shortlisted_job()
    {
        $data = [];
        $job_short = [];
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $data = Shortlist::where('candidate_id', $id)->take(6)->get();
            if (!empty($data)) {
                foreach ($data as $item) {
                    $id_post = $item->job_post_id;
                    $job_short[$id_post] = JobPost::where('id', $id_post)->first();
                }
            }
        }
        $maJor = Major::all();
        return view('client.candidate.shortlisted-job', compact('data', 'job_short', 'maJor'));
    }
    public function destroy($id)
    {
        Shortlist::destroy($id);
        return back();
    }
}