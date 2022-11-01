<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\job;
use App\Models\Jop_type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = job::where('status', 1)->take(6)->get();
        $jop_type = Jop_type::all();
        // dd($jop_type);
        // dd(company::all());
        return view('client.home', compact('data', 'jop_type'));
    }
}
