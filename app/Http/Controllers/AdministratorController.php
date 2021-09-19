<?php

namespace App\Http\Controllers;

use App\Administrator;
use App\Event;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function store(Request $request, Administrator $administrator, Event $event)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $input = $request['administrators'];
        $administrator->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
}
