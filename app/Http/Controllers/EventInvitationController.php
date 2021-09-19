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
        $eventinvitation->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
}
