<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
   protected $fillable = [
        'name','email',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
     public function eventmembers()
    {
        return $this->belongsToMany(Event::class, 'members', 'member_id', 'event_id')->withTimestamps();
    }
    
    public function follow($id, $flg)
    {
        $this->eventmembers()->attach($id, ['flg' => $flg]);
    }
    public function eventjoin($id)
    {
        $this->eventmembers()->attach($id, ['flg' => 2]);
    }
     public function unfollow($id)
    {

        $this->eventmembers()->detach($id);
    }      
}
