<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FeedbackRequest;
use App\Models\company;
use App\Models\Feedback;
use App\Models\JobPost;
use App\Models\Company as ModelsCompany;
use App\Models\Major;
use App\Models\ShortlistCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $job = [];
        $data = company::where('status', 1)->paginate(6);
        // dd($data['id']);
        $search = $request->search;
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
        $query = new Feedback();
        $data = $query->listFeedback($id);
        $sum = count($data);
        $u = 0;
        foreach($data as $list=> $item){
            $u+=$item->rate;
        }
        $average = number_format($u/$sum ,1);
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
        return view('client.company.company-detail', compact('company_detail', 'company_job','average','sum', 'maJor', 'idCompanyShort'));

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
    public function saveFeedback(FeedbackRequest $request, $id)
    {
        $id_user = auth('candidate')->user()->id;
        $feedback = new Feedback();
        $data = Feedback::where('candidate_id',$id_user)->get();
        if(empty($data)){
            $feedback->rate = $request->rate;
            $feedback->candidate_id = $id_user;
            $feedback->company_id = $id;
            $feedback->title = $request->title;
            $feedback->satisfied = $request->satisfied;
            $feedback->unsatisfied = $request->unsatisfied;
            $feedback->like_text = $request->like_text;
            $feedback->improve = $request->improve;
            $feedback->is_candidate="0";
            $feedback->save();
            return redirect()->route('company-detail', ['id' => $id]);
        }else{
            Session::flash('error', 'Tài khoản của bạn đã từng gửi feedback đến công ty');
            return Redirect()->route('feedback', ['id' => $id]);
        }
    }
}
