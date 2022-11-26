<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Candidate;
use App\Models\JobPost;
use App\Models\JobPostActivities;
use App\Models\Major;
use App\Models\SeekerProfile;
use App\Models\Skill;
use App\Models\SkillPost;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        // dd($request->all());
        if (auth('candidate')->check()) {
            $subject = auth('candidate')->user()->id;
            $bitcoin = auth('candidate')->user()->coin;
            $candidate = Candidate::where('status', 1)->where('id', $subject)->first();
            $seeker = SeekerProfile::where('candidate_id', $subject)->first();
            $coin = $bitcoin;
            $date = date('Y/m/d', time());
            $jobspeed = JobPostActivities::where('seeker_id', $seeker->id)->whereDate('created_at', $date)->where('is_function', 2)->first(); // hàm sử lý thời gian
            $major = $seeker->major_id;
            // dd($major);
            $job = JobPost::where('major_id', $major)->get();
            $jobpost = JobPost::where('major_id', $major)->first();
            if (!empty($seeker) && $major != null) {
                if ($coin - 30 < 0) {
                    return back()->with('error', 'Tài Khoản Của Bạn Không Đủ Số Dư Vui Lòng Nạp Thêm Tiền !');
                } elseif (!empty($jobspeed)) {
                    return back()->with('error', 'Hôm Nay Bạn Đã Sử Dụng Phương Thức Này Rồi Vui Lòng Quay Lại Vào Ngày Mai !');
                } elseif (!isset($jobpost)) {
                    return back()->with('warning', 'Không Có Job Nào Phù Hợp!');
                } else {
                    foreach ($job as $item) {
                        $email = $item->company->email;
                        $company_name = $item->company->company_name;
                        Mail::to($email)->send(new SendMail($subject, $company_name));
                        $speed = new JobPostActivities();
                        $speed->job_post_id = $item->id;
                        $speed->seeker_id = $seeker->id;
                        $speed->is_function = 2;
                        $speed->company_id = $item->company_id;
                        $speed->is_see = 0;
                        $speed->save();
                    }
                    $candidate->update([
                        'coin' => $coin - 30,
                    ]);
                }
                return back()->with('success', 'Tìm Kiếm Thành Công');
            } elseif (!empty($seeker) && $major == "") {
                $jobpost = JobPost::where('major_id', $request->major)->first();
                if ($coin - 30 < 0) {
                    return back()->with('error', 'Tài Khoản Của Bạn Không Đủ Số Dư Vui Lòng Nạp Thêm Tiền !');
                }
                if ($major == "" && $request->major == null) {
                    return back()->with('error', 'Bạn Chưa Tạo cv trên hệ thống vui lòng chọn chuyên ngành bạn muốn tìm!');
                } elseif (!empty($jobspeed)) {
                    return back()->with('error', 'Hôm Nay Bạn Đã Sử Dụng Phương Thức Này Rồi Vui Lòng Quay Lại Vào Ngày Mai !');
                } elseif (!isset($jobpost)) {
                    return back()->with('warning', 'Không Có Job Nào Phù Hợp!');
                } else {
                    $job = SkillPost::join('job_posts', 'skill_posts.post_id', '=', 'job_posts.id')->join('skills', 'skill_posts.skill_id', '=', 'skills.id')
                        ->where('job_posts.major_id', '=', $request->major)
                        ->where('skills.id', '=', $request->skill)
                        ->distinct()->select('job_posts.*')->get();
                    // dd($job);
                    foreach ($job as $item) {
                        // dd($item->company_id);
                        $email = $item->company->email;
                        $company_name = $item->company->company_name;
                        Mail::to($email)->send(new SendMail($subject, $company_name));
                        $speed = new JobPostActivities();
                        $speed->job_post_id = $item->id;
                        $speed->seeker_id = $seeker->id;
                        $speed->is_function = 2;
                        $speed->company_id = $item->company_id;
                        $speed->is_see = 0;
                        $speed->save();
                    }
                    $candidate->update([
                        'coin' => $coin - 30,
                    ]);
                    return back()->with('success', 'Tìm Kiếm Thành Công');
                }
            } else {
                return back()->with('error', 'Bạn chưa tạo cv vui lòng tạo cv để sử dụng tính năng này!');
            }
        } else {
            return back()->with('error', 'Vui lòng đăng nhập để sử dụng chức năng!');
        }
    }
    public function jobspeed()
    {
        $maJor = Major::all();
        $skill = Skill::all();
        return view('email.job-speed', compact('maJor', 'skill'));
    }
    public function speedapply()
    {
        $id_user = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $id_user)->first();
        $data = [];
        $job_applied = [];
        if (!empty($seeker)) {
            $job_applied = [];
            $data = JobPostActivities::where('seeker_id', $seeker->id)->where('is_function', 2)->paginate();
            if (!empty($data)) {
                foreach ($data as $item) {
                    $id_post = $item->job_post_id;
                    $job_applied[$id_post] = JobPostActivities::where('id', $id_post)->get();
                }
            }
        }
        $maJor = Major::all();
        return view('client.job.job-speed', compact('data', 'job_applied', 'maJor'));
    }
}
