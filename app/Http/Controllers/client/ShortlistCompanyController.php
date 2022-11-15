<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\ShortlistCompany;
use Illuminate\Http\Request;

class ShortlistCompanyController extends Controller
{
    public function shortlisted_company(Request $request, $id)
    {
        $id_user = auth('candidate')->user()->id;
        $shortlisted = new ShortlistCompany();
        $shortlisted->company_id = $request->id;
        $shortlisted->candidate_id = $id_user;
        $shortlisted->save();
        return back();
    }
    public function shortlisted()
    {
        $data = [];
        if (auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $data = ShortlistCompany::where('candidate_id', $id)->take(6)->get();
        }
        $maJor = Major::all();
        return view('client.candidate.shortlisted-company', compact('data', 'maJor'));
    }
    // public function shortlisted_company()
    // {
    //     $data = [];
    //     $company_short = [];
    //     if (auth('candidate')->check()) {
    //         $id = auth('candidate')->user()->id;
    //         $data = Shortlist::where('candidate_id', $id)->take(6)->get();
    //         if (!empty($data)) {
    //             foreach ($data as $item) {
    //                 $id_post = $item->job_post_id;
    //                 $job_short[$id_post] = JobPost::where('id', $id_post)->first();
    //             }
    //         }
    //     }
    //     $maJor = Major::all();
    //     return view('client.company.shortlisted-company', compact('data', 'job_short', 'maJor'));
    // }
    public function destroy($id)
    {
        ShortlistCompany::destroy($id);
        return back();
    }
}
