<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $fillable = [
    'user1_id',
    'user2_id',
    'event_id',
    ];
    
    public function chats()
    {
        return $this->hasMany('App\Chat','chat_room_id');
    }
    
   
}
