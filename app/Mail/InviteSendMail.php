<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteSendMail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($event, $title, $member)
    {
        $this->event = $event;
        $this->title = $title;
        $this->member = $member;
       
    }
	
    public function build()
    {
        return $this
            ->from('sample@gmail.com', \Auth::user()->name)
            ->subject($this->title)
            ->view('emails.invite_send')
            ->with(['event' => $this->event, 'member' => $this->member]);
    }
}