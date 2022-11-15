<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateCvRequest;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillSeeker;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class CreateCvController extends Controller
{
    private $v;
    public function __construct()
    {
        $this->v = [];
    }

    public function index()
    {
        $id = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id)->first();
        $this->v['seeker'] = $seeker;
        $this->v['skills'] = Skill::all();
        $this->v['major'] = Major::all();
        $this->v['maJor'] = Major::all();

        if (!empty($seeker)) {
            $this->v['experiences'] = Experience::where('seeker_id', $seeker->id)->get();
            $this->v['educations'] = Education::where('seeker_id', $seeker->id)->get();
            $this->v['list_skill'] = SkillSeeker::where('seeker_id', $seeker->id)->get();
            $this->v['certificates'] = Certificate::where('seeker_id', $seeker->id)->get();

            //active skills
            $this->v['skillActive'] = $this->v['list_skill']->pluck('skill_id')->toArray();
        }
        return view('client.upcv.cv', $this->v);
    }

    public function saveInfo(CreateCvRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new SeekerProfile();
        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function updateInfo(CreateCvRequest $request)
    {

        $params = [];
        $params['cols'] = $request->post();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        unset($params['cols']['_token']);
        $model = new SeekerProfile();
        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thất bại!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        } else {
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
        $model = new Experience();

        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function updateExperience(CreateCvRequest $request, $id)
    {
        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $model = new Experience();
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return back();
        }
    }

    public function deleteExperience($id)
    {
        if (isset($id)) {
            Experience::find($id)->delete();
            return redirect()->route('CreateCV');
        }
        return redirect()->route('CreateCV');
    }

    public function saveSkills(CreateCvRequest $request)
    {

        $data = $request->all();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        unset($data['_token']);

        SkillSeeker::where('seeker_id', $data['seeker_id'])->delete();

        foreach ($data['skill_id'] as $skill) {
            SkillSeeker::create([
                'seeker_id' => $data['seeker_id'],
                'skill_id' => $skill,
            ]);
        }
        return back();
    }

    public function DeleteAllSkill($id)
    {
        SkillSeeker::where('seeker_id', $id)->delete();
        return redirect()->route('CreateCV');
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
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function updateEducation(CreateCvRequest $request, $id)
    {
        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $model = new Education();
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return back();
        }
    }

    public function deleteEducation($id)
    {
        if (isset($id)) {
            Education::find($id)->delete();
            return redirect()->route('CreateCV');
        }
        return redirect()->route('CreateCV');
    }

    //certificates
    public function saveCertificate(CreateCvRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();

        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        unset($params['cols']['_token']);
        $model = new Certificate();

        $res = $model->saveAdd($params);
        if ($res == null) {
            Session::flash('error', 'Vui lòng nhập dữ liệu!');
            return back();
        } else if ($res > 0) {
            Session::flash('success', 'Thêm thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi thêm mới!');
            return back();
        }
    }

    public function updateCertificate(CreateCvRequest $request, $id)
    {
        $params = [];
        $params['cols'] = $request->post();

        unset($params['cols']['_token']);
        $model = new Certificate();
        $params['cols']['id'] = $id;
        $res = $model->saveUpdate($params);
        if ($res == null) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        }
        if ($res == 1) {
            Session::flash('success', 'Cập nhật thành công!');
            return back();
        } else {
            Session::flash('error', 'Lỗi cập nhật!');
            return back();
        }
    }

    public function deleteCertificate($id)
    {
        if (isset($id)) {
            Certificate::find($id)->delete();
            return redirect()->route('CreateCV');
        }
        return redirect()->route('CreateCV');
    }

    // up ảnh
    public function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('images', $fileName, 'public');
    }

    public function getPdf(Request $request)
    {
        $id = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id)->first();
        $this->v['seeker'] = $seeker;
        $this->v['skills'] = Skill::all();
        $this->v['major'] = Major::all();
        $this->v['maJor'] = Major::all();

        if (!empty($seeker)) {
            $this->v['experiences'] = Experience::where('seeker_id', $seeker->id)->get();
            $this->v['educations'] = Education::where('seeker_id', $seeker->id)->get();
            $this->v['list_skill'] = SkillSeeker::where('seeker_id', $seeker->id)->get();
            $this->v['certificates'] = Certificate::where('seeker_id', $seeker->id)->get();

            //active skills
            $this->v['skillActive'] = $this->v['list_skill']->pluck('skill_id')->toArray();
        }

        //lưu rồi mở file

        $pdf = Pdf::loadView('client.upcv.index', $this->v);

        $path_pdf = 'upload/cv/';


        $fileName = 'CV-' . $seeker->name . time() . rand('0', '99') . '.pdf';

        $seekerA = SeekerProfile::where('candidate_id', $id)->first();
        $file_path = public_path($seekerA->path_cv);
        if (is_file($file_path)) {
            unlink($file_path);
        }

        SeekerProfile::where('candidate_id', $id)->update([
            'path_cv' => $fileName
        ]);

        $fileName = public_path('upload/cv/'. $fileName);
        $pdf->save($fileName);

        if ($seeker->path_cv == "") {
            Session::flash('success', 'Tạo CV thành công!');
            return back();
        }
        return redirect()->route('seeker');
    }
}
