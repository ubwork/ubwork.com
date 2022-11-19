<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobSpeed;
use App\Models\SeekerProfile;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        $subject = auth('candidate')->user()->id;
        $seeker = SeekerProfile::where('candidate_id', $subject)->first();
        $major = $seeker->major_id;
        $job = JobPost::where('major_id', $major)->get();
        // dd($job);
        if (!empty($seeker)) {
            foreach ($job as $item) {
                $email = $item->company->email;
                Mail::to($email)->send(new SendMail($subject));
                $speed = new JobSpeed();
                $speed->job_post_id = $item->id;
                $speed->seeker_id = $seeker->id;
                $speed->status = '1';
                // dd($speed);
                $speed->save();
            }
        }
        // return back();
    }
}
