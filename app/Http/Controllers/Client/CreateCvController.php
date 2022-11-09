<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCvRequest;
use App\Models\Education;
use App\Models\Experiences;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\Skill_seeker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CreateCvController extends Controller
{
    public function index() {
        $id = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id)->first();
        $skills = Skill::all();
        $experiences = [];
        $list_experiences = [];
        
        $educations = [];
        $list_educations = [];
        if(!empty($seeker)){
            $experiences = Experiences::where('seeker_id', $seeker->id)->first();
            $list_experiences = Experiences::where('seeker_id', $seeker->id)->get();

            $educations = Education::where('seeker_id', $seeker->id)->first();
            $list_educations = Education::where('seeker_id', $seeker->id)->get();
        }
        return view('client.upcv.cv', [
            'seeker' => $seeker,
            'experiences' => $experiences,
            'list_experiences' => $list_experiences,
            'skills' => $skills,
            'educations' => $educations,
            'list_educations' => $list_educations,
        ]);
    }

    public function saveInfo(CreateCvRequest $request) 
    {
        $params = [];
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        unset($params['cols']['_token']);
        $model = new SeekerProfile();
        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }  
    }

    public function updateInfo(CreateCvRequest $request) 
    {
        
        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $model = new SeekerProfile();
        $res = $model->saveUpdate($params);
        if($res == null) {
            Session::flash('success', 'Cập nhật thất bại!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return back();
        }
        
    }

    public function saveExperience(CreateCvRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();

        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        unset($params['cols']['_token']);
        $model = new Experiences();

        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function updateExperience(CreateCvRequest $request) 
    {
        
        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $params['cols']['verify_company'] = "aaa";
        $model = new Experiences();
        $res = $model->saveUpdate($params);
        if($res == null) {
            Session::flash('success', 'Cập nhật thất bại!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi cập nhật!');
            return back();
        }
        
    }

    public function deleteExperience($id) {
        Experiences::find($id)->delete();
        return redirect()->route('create_cv');
    }

    public function saveSkills(CreateCvRequest $request) {

        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $model = new Skill_seeker();

        $a = implode(",", $params['cols']['skill_id']);
        $params['cols']['skill_id'] = $a;

        dd($params);
        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function saveEducation(CreateCvRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();

        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        unset($params['cols']['_token']);
        $model = new Education();

        $res = $model->saveAdd($params);
        if($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        }
        else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        }else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function deleteEducation($id) {
        Education::find($id)->delete();
        return redirect()->route('create_cv');
    }
    
        
}
