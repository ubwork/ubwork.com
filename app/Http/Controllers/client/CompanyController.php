<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = company::where('status', 1)->get();
        // dd($data['id']);
        foreach ($data as $item) {
            // dd($item->id);
            $job = job::where('company_id', $item->id)->get();
        }
        // dd(count($job));
        return view('client.company.company', compact('data', 'job'));
    }
    public function detail($id)
    {
        $company_detail = company::where('id', $id)->first();
        $company_job = job::where('company_id', $company_detail->id)->get();
        return view('client.company.company-detail', compact('company_detail', 'company_job'));
    }
}
