<?php

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('event_join', 'EventJoinController@update');
Route::get('event_join_sample', 'EventJoinController@previewsample')->name('previewsample');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'EventsController@index')->name('events');
    Route::resource('events', 'EventsController');
    
    Route::group(['prefix' => 'event/{eventID}/friend/{frinedID}'], function () {    
        Route::get('follow', 'EventMembersController@store')->name('follow');
        Route::get('join', 'EventMembersController@join')->name('join');
        Route::get('unfollow', 'EventMembersController@destroy')->name('unfollow');
    });
    
    Route::group(['prefix' => 'event/{id}'], function () {
        Route::get('members', 'EventMembersController@members')->name('members');
    });
    
    // 送信メール本文のプレビュー
    Route::get('invite_preview/{id}', 'SendMailController@invite_preview')->name('invite_preview');
    Route::get('invite_send/{id}', 'SendMailController@invite_Notification')->name('invite_sendmail');
    
    Route::get('preview/{id}', 'SendMailController@preview')->name('preview');
    Route::get('send/{id}', 'SendMailController@previewNotification')->name('sendmail');
    
    Route::resource('users', 'UsersController');
    Route::resource('friends', 'FriendsController');
});