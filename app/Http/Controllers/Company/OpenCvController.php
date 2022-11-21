<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\OpenCv;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Major;
use App\Models\Experience;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillSeeker;
use Illuminate\Http\Request;

class OpenCvController extends Controller
{
    public function index(Request $request) {

        $title = "Quản lý CV";
        $activeRoute = "view-open-cv";
        $idCompany = auth('company')->user()->id;
        $data = OpenCv::where('company_id', $idCompany)->get();
        // dd($data);
        $com_short = [];
        if (!empty($data)) {
            foreach ($data as $item) {
                $seeker_id = $item->seeker_id;
                $com_short[$seeker_id] = SeekerProfile::where('id', $seeker_id)->first();
            }
        }


        return view('company.open-cv.index', compact('title', 'data','com_short','activeRoute'));
    }

    public function store($id) {
        $idCompany = auth('company')->user()->id;
        $openCv = new OpenCv();
        $openCv->seeker_id = $id;
        $openCv->company_id = $idCompany;
        $openCv->save();
        
        return back();
    }
}
