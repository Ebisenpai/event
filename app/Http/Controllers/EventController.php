<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Chat;
use App\ChatRoom;
use App\EventInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
     public function index(Event $event,User $user)
    {
        return view('index')->with(['events' => $event->get(),'users' =>$user->get()]);
    }
    public function show(Event $event,User $user)
    {
         $chat_rooms = $event->chat_rooms();
         $chat_rooms = $chat_rooms->where(function($query){
                    $query->where('user1_id', auth()->user()->id)
                            ->orWhere('user2_id', auth()->user()->id);
                            })->get();
        //authがチャットしているユーザーの配列
        $array = array();
        foreach($chat_rooms as $chatroom){
            if($chatroom->user1_id != Auth::id()){
                $array[] = $chatroom->user1_id;
            }else{
                $array[] = $chatroom->user2_id;
            }
        }
        $sent_user_id = $array;
        //dd($sent_user_id);
       
        //招待ユーザーidの配列を作る
        $invited_users=$event->invited_users()->get();
        $array1 = array();
        foreach($invited_users as $invited_user){
            $array1[] = $invited_user->id;
        }
        $invited_user_id = $array1;
        //dd($invited_user_id);
        
         //招待ユーザーからチャットしているユーザを取り除く
        $unsent_user_id=$invited_user_id;
                        
        foreach($sent_user_id as $sentuser_id){                
            $key = array_search($sentuser_id, $unsent_user_id);
            if(!is_bool($key)){
                unset($unsent_user_id[$key]);
            }
        }    
        
        return view('show')->with([
            'unsent_user_id' => $unsent_user_id,
            'sent_user_id' => $sent_user_id,
            'chat_rooms' => $chat_rooms,
            'events' =>$event,
            'users' =>$user->get()]);
    }
    
    public function create()
    {
        return view('create');
    }
    public function store(Request $request, Event $event, User $user)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        dd($request);
        $input = $request['events'];//変数nputにリクエストインスタンスのevens配列を代入
        $input['user_id']=auth()->user()->id;//配列の追加を行っている。auth()はヘルパを参照
        $event->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
    public function approve(Request $request, Event $event, EventInvitation $eventinvitation)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $matchThese = ['event_id' => $request['inviting'], 'invited_user' => auth()->user()->id];
        $eventinvitation = EventInvitation::where($matchThese)->first();
        $eventinvitation->invitation_status = 1;
        $eventinvitation->save();
        return redirect('/events/');
    }
}
?>
