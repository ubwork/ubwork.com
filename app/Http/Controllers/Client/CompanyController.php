<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\Company as ModelsCompany;
use App\Models\FeedbackCompany;
use App\Models\JobPost;
use App\Models\Major;
use App\Models\ShortlistCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $job = [];
        $data = company::where('status', 1)->paginate(6);
        // dd($data['id']);
        $search = $request->search;
        $size = $request->size;
        if (isset($search) && isset($size)) {
            $data = company::where('status', 1)->where('company_name', 'like', '%' . $search . '%')->where('company_model', 'like','%' . $size . '%')->paginate(10);
        }elseif(isset($search) && $size == null){
            $data = company::where('status', 1)->where('company_name', 'like', '%' . $search . '%')->paginate(10);
        }elseif($search == null && isset($size)){
            $data = company::where('status', 1)->where('company_model', 'like','%' . $size . '%')->paginate(10);
        } else {
            $data = company::where('status', 1)->paginate(10);
        }
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
        $idCompanyShort = [];
        if (auth('candidate')->check()) {
            $id_user = auth('candidate')->user()->id;
            $dataShort = ShortlistCompany::where('candidate_id', $id_user)->get();
            if (!empty($dataShort)) {
                foreach ($dataShort as $item) {
                    $idCompanyShort[$item->company_id] = $item;
                }
            }
        }
        // dd($idJobApplied[$item->id]);
        // dd($data_job->id);
        return view('client.company.company-detail', compact('company_detail', 'company_job', 'maJor', 'idCompanyShort'));
    }
    public function filter(Request $request)
    {
        $keyword = $request->keyword;
        $address = $request->address;
        $job = [];
        $data = company::where('name', 'like', '%' . $keyword . '%')->Where('address', 'like', '%' . $address . '%')->get();
        $maJor = Major::all();
        foreach ($data as $item) {
            // dd($item->id);
            $job = JobPost::where('company_id', $item->id)->get();
        }
        return view('client.company.company', compact('data', 'maJor', 'job'));
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
