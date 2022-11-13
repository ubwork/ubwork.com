<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\Company as ModelsCompany;
use App\Models\FeedbackCompany;
use App\Models\JobPost;
use App\Models\Major;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $data = [];
        $job = [];
        $data = company::where('status', 1)->get();
        // dd($data['id']);
        foreach ($data as $item) {
            // dd($item->id);
            $job = JobPost::where('company_id', $item->id)->get();
        }
        // dd(count($job));
        $maJor = Major::all();
        return view('client.company.company', compact('data', 'job', 'maJor'));
    }
    public function detail($id)
    {
        $company_detail = company::where('id', $id)->first();
        $company_job = JobPost::where('company_id', $company_detail->id)->get();
        $maJor = Major::all();
        return view('client.company.company-detail', compact('company_detail', 'company_job', 'maJor'));
    }
    public function filter(Request $request)
    {
        $keyword = $request->keyword;
        $address = $request->address;
        $data = company::where('name', 'like', '%' . $keyword . '%')->Where('address', 'like', '%' . $address . '%')->get();
        $maJor = Major::all();
        return view('client.company.company', compact('data', 'maJor'));
    }
    public function feedback($id)
    {
        $company_detail = company::where('id', $id)->first();
        $company_job = JobPost::where('company_id', $company_detail->id)->get();
        $maJor = Major::all();
        return view('client.company.feedback', compact('company_detail', 'company_job', 'maJor'));
    }
    public function saveFeedback(Request $request, $id)
    {
        $id_user = auth('candidate')->user()->id;
        $feedback = new FeedbackCompany();
        $feedback->rate = $request->rate;
        $feedback->candidate_id = $id_user;
        $feedback->company_id = $id;
        $feedback->satisfied = $request->satisfied;
        $feedback->unsatisfied = $request->unsatisfied;
        $feedback->like_text = $request->like_text;
        $feedback->dislike_text = $request->dislike_text;
        $feedback->improve = $request->improve;
        $feedback->comment = $request->comment;
        $feedback->save();
        return redirect()->route('company-detail', ['id' => $id]);
    }
}
