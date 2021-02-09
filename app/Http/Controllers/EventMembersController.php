<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Friend;

class EventMembersController extends Controller
{
    
    public function store($eventID, $friendID)
    {
        $friend=Friend::find($friendID);
        $flg = 1;
        $friend->follow($eventID,$flg);
        return back();
    }
    
    public function join($eventID, $friendID)
    {
        $friend=Friend::find($friendID);
        $friend->unfollow($eventID);
        $flg = 2;
        $friend->eventjoin($eventID,$flg);
        return back();
    }


    public function destroy($eventID, $friendID)
    {
        $friend = Friend::findOrFail($friendID);
        $friend->unfollow($eventID);
        return back();
    }
    
     public function members($id){
        $event = Event::findOrFail($id);
        $invite_members = $event->inviememberevents()->get();
        $join_members = $event->joinmemberevents()->get();
        $unmembers = Friend::whereDoesntHave('eventmembers', function ($query) use($id){
            $query->where('event_id', $id);
            })->get();
        
        $data = [];
        $data = [
                'invite_members' => $invite_members,
                'join_members' => $join_members,
                'unmembers' => $unmembers,
                'event' => $event,
                ];
        
        return view('members.members', $data);
    }


}
