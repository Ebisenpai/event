<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventInvitationController extends Controller
{
    public function store(Request $request, EventInvitation $eventinvitation)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $input = $request['EventInvitations'];//変数nputにリクエストインスタンスのevens配列を代入
        $input['inviting_user']=auth()->user()->id;//配列の追加を行っている。auth()はヘルパを参照
        $event->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
}
