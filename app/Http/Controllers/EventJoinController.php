<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;

class EventJoinController extends Controller
{
    public function update(Request $request)
    {
        // /event_join?email=example.com&eventId=999 のようなURL
        // メールアドレスからユーザを引っ張ってきて、参加管理テーブルに登録
        // eventIdで開催イベントを取得
        
        $friend = Friend::findOrFail($request->input('member_id'));
        $friend->unfollow($request->input('event_id'));
        $friend->follow($request->input('event_id'), $request->input('flg'));
         
        // 最後に登録完了ページ表示
        return view('event_join_success', ['flg' => $request->input('flg'),]);
        
    }
    public function previewsample(){
        return view('event_join_success_sample');
    }
    
}
