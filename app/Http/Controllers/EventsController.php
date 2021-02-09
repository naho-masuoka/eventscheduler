<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Friend;
use App\Message;

class EventsController extends Controller
{

    public function index()
    {
        $data = [];

        if (\Auth::check()){
            $user = \Auth::user();
            $events = $user->events()->orderBy('id', 'asc')->get();
            $data = [
                'user' => $user,
                'events' => $events,
                ];
            return view('events.events', $data);

        }
    }

    public function create()
    {
        $data = [];

        $user = \Auth::user();
     return view('events.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);
        
        $user = \Auth::user();
        $event = new Event;
        $event->user_id =\Auth::user()->id;
        $event->name = $request->name;
        $event->schedule = $request->schedule;
        $event->place = $request->place;
        $event->title = $request->title;
        $event->content = $request->content;
        $event->save();
        $data = [];
        $last_insert_id = $event->id;
        
        $event = Event::findOrFail($last_insert_id);
        $invite_members = $event->inviememberevents()->get();
        $join_members = $event->joinmemberevents()->get();

        $unmembers = Friend::whereDoesntHave('eventmembers', function ($query) use($last_insert_id){
            $query->where('event_id', $last_insert_id);
            })->get();
        
        $data = [];
        $data = [
                'invite_members' => $invite_members,
                'join_members' => $join_members,
                'unmembers' => $unmembers,
                'event' => $event,
                ];
        
        return view('events.edit',$data);
    }
    public function edit($id)
    {

        $user = \Auth::user();
        
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
        
        return view('events.edit',$data);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);
       
        $data = [];
        $user = \Auth::user();
        $event = Event::findOrFail($id);
        $event->user_id =\Auth::user()->id;
        $event->name = $request->name;
        $event->schedule = $request->schedule;
        $event->place = $request->place;
        $event->title = $request->title;
        $event->content = $request->content;
        $event->save();

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
        
        return view('events.edit',$data);
    }


    public function destroy($id)
    {
        //
    }
    
        
}
