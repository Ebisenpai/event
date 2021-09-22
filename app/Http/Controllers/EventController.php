<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
     public function index(Event $event,User $user)
    {
        return view('index')->with(['events' => $event->get(),'users' =>$user->get()]);
    }
    public function show(Event $event,User $user)
    {
        return view('show')->with(['events' =>$event,'users' =>$user->get()]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request, Event $event, User $user)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $input = $request['events'];//変数nputにリクエストインスタンスのevens配列を代入
        $input['user_id']=auth()->user()->id;//配列の追加を行っている。auth()はヘルパを参照
        $event->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
    public function approve(Event $event)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        dd($event->get());
        return redirect('/events/');
    }
}
?>
