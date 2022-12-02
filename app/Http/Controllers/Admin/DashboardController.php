<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $candidates = Candidate::all();
        $companies = Company::all();
        $cv = SeekerProfile::all();
        $skill = Skill::all();
        $major = Major::all();
        $pendingImagePaper = Company::where('status', 0)->get()->toArray();
        $activeImagePaper = Company::where('status', 1)->get()->toArray();
        $blockImagePaper = Company::where('status', 2)->get()->toArray();
        // dd($companyImagePaper);
        return view('admin.dashboard', [
            'countCandidate' => $candidates,
            'countCompany' => $companies,
            'countCV'=> $cv,
            'countSkill'=> $skill,
            'countMajor'=> $major,
            'countPendingImagePaper'=> $pendingImagePaper,
            'countActiveImagePaper'=> $activeImagePaper,
            'countBlockImagePaper'=> $blockImagePaper,
        ]);
    }
}

