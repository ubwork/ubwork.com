<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
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
}
