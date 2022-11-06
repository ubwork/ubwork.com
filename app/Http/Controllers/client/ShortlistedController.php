<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\job;
use App\Models\Shortlisted;
use Illuminate\Http\Request;

class ShortlistedController extends Controller
{
    public function shortlisted(Request $request, $id)
    {
        $shortlisted = new Shortlisted;
        $shortlisted->job_post_id = $request->id;
        $shortlisted->candidate_id = '1';
        $shortlisted->save();
        return back();
    }
    public function shortlisted_job($id)
    {
        $data = Shortlisted::where('candidate_id', $id)->take(6)->get();
        foreach ($data as $item) {
            $id_post = $item->job_post_id;
            $job_short[$id_post] = job::where('id', $id_post)->first();
        }
        return view('client.candidate.shortlisted-job', compact('data', 'job_short'));
    }
}
