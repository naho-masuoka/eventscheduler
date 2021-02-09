<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = \Auth::user();
        return view('users.update', ['user' => $user,]);
    }
   
    public function edit($id)
    {
        $user = \Auth::user();
        return view('users.update', ['user' => $user,]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = [];
        $members_count = [];
        $mails_count = [];
        $joinmembers_count = [];
        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $user = \Auth::user();
        $data = [
                'user' => $user,
                'flash' => '更新完了です！'
                ];
        return view('users.update', $data);
    }
    
    
}