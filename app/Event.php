<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id', 'name', 'place', 'schedule', 'title', 'content',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function friends()
    {
        return $this->hasMany(Friend::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Email::class);
    }
    public function inviememberevents()
    {
        return $this->belongsToMany(Friend::class, 'members', 'event_id', 'member_id')->where('flg', '1')->withTimestamps();
    }
    public function joinmemberevents()
    {
        return $this->belongsToMany(Friend::class, 'members', 'event_id', 'member_id')->where('flg', '2')->withTimestamps();
    }
    
    public function memberevents()
    {
        return $this->belongsToMany(Friend::class, 'members', 'event_id', 'member_id')->withTimestamps();
    }
}
