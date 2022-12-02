<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateCvRequest;
use App\Models\Candidate;
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
        if(auth('candidate')->check()) {
            $id = auth('candidate')->user()->id;
            $seeker = SeekerProfile::where('candidate_id', $id)->first();
            $this->v['seeker'] = $seeker;
            $this->v['skills'] = Skill::all();
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
        return redirect()->route('candidate.login');
    }

    public function saveInfo(CreateCvRequest $request)
    {
        $id = auth('candidate')->user()->id;
        $params = [];
        $params['cols'] = $request->post();
        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $params['cols']['image'] = $this->uploadFile($request->file('image'));
        }

        $candidateImage = Candidate::where('id', $id)->first();
        if($candidateImage->avatar == "" && $params['cols']['image'] != "") {
            $candidateImage->avatar = $params['cols']['image'];
            $candidateImage->save();
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

    public function saveExperience(CreateCvRequest $request)
    {
        $params = [];
        $params['cols'] = $request->post();

        $params['cols']['created_at'] = Carbon::now()->toDateTimeString();
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        $bat_dau = strtotime($params['cols']['start_date']);
        if(empty($ket_thuc)){
            $ket_thuc = Carbon::now()->toDateTimeString();
        }else {
            $ket_thuc = $params['cols']['end_date'];
        }
        $ket_thuc = strtotime($ket_thuc);
        $tong = $ket_thuc - $bat_dau;
        $day = floor($tong / 60 / 60 / 24);
        $day = round($day /30/12, 1);

        $params['cols']['time_exp'] =  $day;
        
        $seeker = SeekerProfile::where('id', auth('candidate')->user()->id)->first();
        $seeker->total_exp = $seeker->total_exp += $day;
        $seeker->save();

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

        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

        $bat_dau = strtotime($params['cols']['start_date']);
        if(empty($ket_thuc)){
            $ket_thuc = Carbon::now()->toDateTimeString();
        }else {
            $ket_thuc = $params['cols']['end_date'];
        }
        $ket_thuc = strtotime($ket_thuc);
        $tong = $ket_thuc - $bat_dau;
        $day = floor($tong / 60 / 60 / 24);
        $day = round($day /30/12, 1);

        $params['cols']['time_exp'] =  $day;

        $seeker = SeekerProfile::where('id', $params['cols']['seeker_id'])->first();
        $seeker->total_exp = $seeker->total_exp += $day;
        $seeker->save();

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
            $exp = Experience::find($id);
            $bat_dau = strtotime($exp->start_date);
            if(empty($ket_thuc)){
                $ket_thuc = Carbon::now()->toDateTimeString();
            }else {
                $ket_thuc = $exp->end_date;
            }
            $ket_thuc = strtotime($ket_thuc);
            $tong = $ket_thuc - $bat_dau;
            $day = floor($tong / 60 / 60 / 24);
            $day = round($day /30/12, 1);

            $seeker = SeekerProfile::where('id', $exp->seeker_id)->first();
            $seeker->total_exp = $seeker->total_exp -= $day;
            $seeker->save();

            $exp->delete();
            Session::flash('success', 'Xóa thành công!');
            return redirect()->route('CreateCV');
        }
        Session::flash('error', 'Xóa thất bại!');
        return redirect()->route('CreateCV');
    }

    public function saveSkills(Request $request)
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
        return response()->json(['success' => 'Cập nhật thành công!']);
    }

    public function DeleteAllSkill($id)
    {
        SkillSeeker::where('seeker_id', $id)->delete();
        Session::flash('success', 'Xóa thành công!');
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
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

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
        Session::flash('success', 'Xóa thành công!');
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
        $params['cols']['updated_at'] = Carbon::now()->toDateTimeString();

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
        $fileName = 'CV-' . $seeker->name .'_'. time() . rand('0', '99') . '.pdf';

        $seekerA = SeekerProfile::where('candidate_id', $id)->first();
        $file_path = public_path('upload/cv/'.$seekerA->path_cv);

        if (is_file($file_path)) {
            unlink($file_path);
        }

        SeekerProfile::where('candidate_id', $id)->update([
            'path_cv' => $fileName
        ]);

        $fileName = public_path('upload/cv/'. $fileName);
        $pdf->save($fileName);

        Session::flash('success', 'Cập nhật CV thành công!');
        return redirect()->route('seeker');
    }
}
