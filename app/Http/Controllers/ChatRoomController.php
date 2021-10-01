<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatRoom;
use Illuminate\Http\Request;


class ChatRoomController extends Controller
{
    public function chat(ChatRoom $chatroom)
    {
        return view('chat')->with([
            'chatrooms' =>$chatroom,
            ]);
    }
}
