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
        $id_user = auth('candidate')->user()->id;
        $shortlisted = new Shortlisted;
        $shortlisted->job_post_id = $request->id;
        $shortlisted->candidate_id = $id_user;
        $shortlisted->save();
        return back();
    }
    public function shortlisted_job()
    {
        $id = auth('candidate')->user()->id;
        $job_short = [];
        $data = Shortlisted::where('candidate_id', $id)->take(6)->get();
        if (!empty($data)) {
            foreach ($data as $item) {
                $id_post = $item->job_post_id;
                $job_short[$id_post] = job::where('id', $id_post)->first();
            }
        }
        return view('client.candidate.shortlisted-job', compact('data', 'job_short'));
    }
    public function destroy($id)
    {
        Shortlisted::destroy($id);
        return back();
    }
}
