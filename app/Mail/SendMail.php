<?php

namespace App\Mail;

use App\Models\JobPost;
use App\Models\SeekerProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;

    public function __construct($subject)
    {
        $this->subject = $subject;
    }
    public function build(){
        $user = auth('candidate')->user()->id;
        $name = auth('candidate')->user()->name;
        $seeker = SeekerProfile::where('candidate_id', $user)->first();
        $major = $seeker->major_id;
        $job = JobPost::where('major_id', $major)->get();
        return $this->subject('UbWork')
                    ->view('email.email', compact('job', 'name'));
    }
}
