<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;
class FriendsController extends Controller
{
public function index()
    {
        $data = [];
        $user = \Auth::user();
        $friends = $user->friends()->orderBy('name', 'asc')->get();
        $data = [
                'user' => $user,
                'friends' => $friends,
                ];
        
        return view('friends.friends', $data);
    }

    public function create()
    {
        $data = [];
        $user = \Auth::user();
        $friends = $user->friends()->orderBy('name', 'asc')->get();
        $friend = new Friend;
        $data = [
                'user' => $user,
                'friend' => $friend,
                'friends' => $friends
                ];
        return view('friends.create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);
        
        $data = [];
        $user = \Auth::user();
        $friend = new friend;
        $friend->user_id =\Auth::user()->id;
        $friend->name = $request->name;
        $friend->email = $request->email;
        $friend->save();

        $person = friend::findOrFail($friend->id);
        $friends = $user->friends()->orderBy('name', 'asc')->get();
        $data = [
                'user' => $user,
                'person' => $person,
                'friends' => $friends,
                'flash' => '作成完了しました！'
                ];
        return view('friends.edit', $data);

    }

    public function show($id)
    {
    }
    
    public function edit($id)
    {
        $person = friend::findOrFail($id);
        $user = \Auth::user();
        $friends = $user->friends()->orderBy('name', 'asc')->get();
        $data = [
                'user' =>$user,
                'person' => $person,
                'friends' => $friends
                ];
        return view('friends.edit', $data);
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ]);
        
        $data = [];
        $user = \Auth::user();
        $friend = friend::findOrFail($id);
        $person = friend::findOrFail($id);
        $friend->user_id =\Auth::user()->id;
        $friend->name = $request->name;
        $friend->email = $request->email;
        $friend->save();

        $friends = $user->friends()->orderBy('name', 'asc')->get();
        $data = [
                'user' => $user,
                'person' => $person,
                'friends' => $friends,
                'flash' => '更新完了しました！'
                ];
        return view('friends.edit', $data);
    }
    public function destroy($id)
    {
        //
    }
}
