<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatRoom;
use App\Event;
use Illuminate\Http\Request;


class ChatRoomController extends Controller
{
    public function chat(Event $event ,ChatRoom $chatroom)
    {
        return view('chat')->with([
            'chatrooms' =>$chatroom,
            ]);
    }
}
