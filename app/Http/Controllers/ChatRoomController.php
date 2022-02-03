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
            'chatroom' =>$chatroom,
            'events' =>$event,
            ]);
    }
    
    public function store(Request $request, Event $event ,ChatRoom $chatroom ,Chat $chat)
    {
        $input = $request['chats'];
        //チャットルームの新規作成
        $input_chat_rooms = [];
        $input_chat_rooms['event_id'] = $input['event_id'];
        $input_chat_rooms['first_user_id'] = $input['send_user_id'];
        $input_chat_rooms['member_id'] = $input['receiver_id'];
        $chatroom->fill($input_chat_rooms)->save();
        
        //作成したチャットルームidの取得
        $created_chat_room = ChatRoom::where('first_user_id', $input['send_user_id'])
        ->where('member_id', $input['receiver_id'])
        ->where('event_id', $input['event_id'])->first();
        
        //チャットの送信
        $input_chats = [];
        $input_chats['chat_room_id'] = $created_chat_room->id;
        $input_chats['message'] = $input['message'];
        $input_chats['send_user_id'] = $input['send_user_id'];
        $chat->fill($input_chats)->save();
        return redirect('/events'. $input['event_id'].'/'. $created_chat_room->id);
    }
}
