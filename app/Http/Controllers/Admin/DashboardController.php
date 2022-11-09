<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $candidates = Candidate::all();
        $companies = Company::all();
        return view('admin.dashboard', [
            'countCandidate' => $candidates,
            'contCompany' => $companies
        ]);
    }
}

