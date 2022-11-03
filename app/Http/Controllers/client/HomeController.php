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
        $arr = [];
        $data = job::where('status', 1)->take(6)->get();
        $jop_type = Jop_type::all();
        foreach ($jop_type as $item) {
            $id = $item->id;
            $count[$id] = job::where('jop_type_id', $id)->count();
        }
        // dd(company::all());
        return view('client.home', compact('data', 'jop_type', 'count'));
    }
}
