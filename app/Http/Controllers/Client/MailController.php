<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobSpeed;
use App\Models\Major;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        $subject = auth('candidate')->user()->id;
        $bitcoin = auth('candidate')->user()->coin;
        $candidate = Candidate::where('status', 1)->where('id', $subject)->first();
        $seeker = SeekerProfile::where('candidate_id', $subject)->first();
        $major = $seeker->major_id;
        $job = JobPost::where('major_id', $major)->get();
        $jobpost = JobPost::where('major_id', $major)->first();
        $coin = $bitcoin;
        $date = date('Y/m/d', time());
        $jobspeed = JobSpeed::where('seeker_id', $subject)->whereDate('created_at', $date)->first(); // hàm sử lý thời gian
        if (!empty($seeker)) {
            if ($coin - 30 < 0) {
                return back()->with('error', 'Tài Khoản Của Bạn Không Đủ Số Dư Vui Lòng Nạp Thêm Tiền !');
            } elseif (!isset($jobpost)) {
                return back()->with('warning', 'Không Có Job Nào Phù Hợp!');
            }elseif(!empty($jobspeed)){
                return back()->with('error', 'Hôm Nay Bạn Đã Sử Dụng Phương Thức Này Rồi Vui Lòng Quay Lại Vào Ngày Mai !');
            } else {
                foreach ($job as $item) {
                    $email = $item->company->email;
                    Mail::to($email)->send(new SendMail($subject));
                    $speed = new JobSpeed();
                    $speed->job_post_id = $item->id;
                    $speed->seeker_id = $seeker->id;
                    $speed->status = '1';
                    $speed->save();
                }
                $candidate->update([
                    'coin' => $coin - 30,
                ]);
            }

            return back()->with('success', 'Tìm Kiếm Thành Công');
        }
        // return back();
    }
    public function jobspeed()
    {
        $maJor = Major::all();
        return view('email.job-speed', compact('maJor'));
    }
}
