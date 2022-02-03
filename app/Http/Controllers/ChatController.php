<?php

namespace App\Http\Controllers;

use App\Chat;
use App\ChatRoom;
use App\Event;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function store(Request $request, Event $event ,ChatRoom $chatroom ,Chat $chat)
    {
        $input = $request['chats'];
        $event_id = $input['event_id'];
        unset($input['event_id']);
        $chat->fill($input)->save();
        return redirect('/events'. $event_id.'/'. $input['chat_room_id']);
    }
}
