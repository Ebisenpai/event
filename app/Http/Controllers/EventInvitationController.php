<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventInvitation;
use Illuminate\Http\Request;

class EventInvitationController extends Controller
{
    public function store(Request $request, EventInvitation $eventinvitation, Event $event)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $input = $request['eventinvitations'];//変数nputにリクエストインスタンスのevens配列を代入
        $input['inviting_user']=auth()->user()->id;//配列の追加を行っている。auth()はヘルパを参照
        $invitation = Eventinvitation::where('event_id', $input['event_id'])
        ->where('invited_user', $input['invited_user'])->get();
        $event_id_array = $request['eventinvitations'];
        $event_id = $event_id_array['event_id'];
        if($invitation->isEmpty())
        {
            $eventinvitation->fill($input)->save();//イベントモデルに変数inputの値を入れる
            return redirect('/events/' . $event_id);
        }
        else{
            return redirect('/events/' . $event_id);
        }
    }
}
