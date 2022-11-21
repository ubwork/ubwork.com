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
    public $company_name;
    public $message;

    public function __construct($subject, $company_name,$message)
    {
        $this->subject = $subject;
        $this->company_name = $company_name;
    }
    public function build(){
        $user = auth('candidate')->user()->id;
        $name = auth('candidate')->user()->name;
        $company_name = $this->company_name;
        return $this->subject('UbWork')
                    ->view('email.email', compact('name','company_name'));
    }
}
