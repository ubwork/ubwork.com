<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\FeedbackRequest;
use App\Models\company;
use App\Models\Feedback;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        return view('client.company.company', compact('data', 'job'));
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
        
        return view('client.company.company-detail', compact('company_detail', 'company_job','average','sum'));
    }
    public function feedback($id)
    {
        $company_detail = company::where('id', $id)->first();
        $company_job = JobPost::where('company_id', $company_detail->id)->get();
        return view('client.company.feedback', compact('company_detail', 'company_job'));
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
