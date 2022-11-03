<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        $data = Candidate::where('status', 1)->get();
        // dd($data);
        return view('client.candidate.candi-list', compact('data'));
    }
}
