<?php

namespace App;

use App\ChatRoom;
use App\User;
use App\Chats;
use Illuminate\Support\Facades\Auth;
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
    
    public function latest_chat()
    {
        $latest_chat_id = $this->chats()->max('id');
        return $this->chats()->where('id',$latest_chat_id)->first()->message;
    }
   
   public function partner()
   {
    if($this->user1_id != Auth::id()){
        $partner_id=$this->user1_id;
        }else{
        $partner_id=$this->user2_id;
        }
    $partner=User::where('id',$partner_id)->first();
    $partner_name=$partner->name;
    return $partner_name;
   }
}
