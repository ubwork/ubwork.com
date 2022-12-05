<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // company
    public function indexc($id){
        $list = Feedback::where('company_id',$id)
                                ->where('is_candidate',0)
                                ->get();
        foreach($list as $u){
            $a[]=$u->candidate_id;
        }
        foreach($a as $b=>$c){
            $can[] = Candidate::where('id',$c)->paginate(9);
        }

        $name = Company::where('id',$id)->first();
        $title = "Danh sách bài Feedback của công ty: $name->company_name";
        return view('admin.feedback.company.index',compact('list','can','title'));
    }
    // candidate
    public function index($id){
        $list = Feedback::where('candidate_id',$id)
                                ->where('is_candidate',1)
                                ->get();
        foreach($list as $u){
            $a[]=$u->company_id;
        }
        foreach($a as $b=>$c){
            $can[] = Company::where('id',$c)->paginate(9);
        }

        $name = Candidate::where('id',$id)->first();
        $title = "Danh sách các bài Feedback dành cho ứng viên: $name->name";
        return view('admin.feedback.candidate.index',compact('list','can','title'));
    }
    public function destroy($id)
    {
        $feedback = Feedback::where('id', $id)->first();
        $id = Candidate::where('id',$feedback->candidate_id)->first();
        $feedback->delete();
        return Redirect()->route('admin.feedback.candidate.index', ['id' => $id]);
    }
}
