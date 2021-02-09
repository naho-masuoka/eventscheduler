<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendMail;
use App\Mail\InviteSendMail;

use App\Email;
use App\Event;
use App\friend;

class SendMailController extends Controller
{
  public function invite_preview($id)
  {
    
      $data = [];
      $user = \Auth::user();
      $event = Event::findOrFail($id);

      $members = $event->memberevents()->get();

      $data = [
                'user' => $user,
                'event' => $event,
                'members' => $members,
                ];
    return view('emails.invite_preview',$data);
  }

public function invite_Notification($id)
  {
    $user = \Auth::user();
    $event = Event::findOrFail($id);
    $title = $event->title;
    
    $members = $event->memberevents()->get();
    
    foreach($members as $member){
      Mail::to($member)->send(new InviteSendMail($event, $title, $member, $user));
    }
    
    $events = $user->events()->orderBy('id', 'asc')->get();
    
    $data = [
            'user' => $user,
            'events' => $events,
            ];
    return view('events.events', $data);
  }
  
  public function preview($id)
  {
    
      $data = [];
      $user = \Auth::user();
      $event = Event::findOrFail($id);
      $members = $event->joinmemberevents()->get();
      $data = [
                'user' => $user,
                'event' => $event,
                'members' => $members,
                ];
    return view('emails.preview',$data);
  }
 
public function previewNotification($id)
  {
    $user = \Auth::user();
    $event = Event::findOrFail($id);
    $title = $event->title;
    $members = $event->memberevents()->get();
    foreach($members as $member){
      Mail::to($member)->send(new SendMail($event, $title, $member, $user));
    }
    
    $events = $user->events()->orderBy('id', 'asc')->get();
    
    $data = [
            'user' => $user,
            'event' => $event,
            'events' => $events,
            ];
    return view('events.events', $data);
  }
}
