<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\Chat;
use App\ChatRoom;
use App\Member;
use App\EventInvitation;
use App\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
     public function index(Event $event,User $user)
    {
        return view('index')->with(['events' => $event->get()
            ,'users' =>$user->get()]);
    }
    //自分のチャットルームの取得
    public function my_chatroom($event){
        $chat_rooms = $event->chat_rooms();
        $chat_rooms = $chat_rooms->where(function($query){
            $query->where('first_user_id', auth()->user()->id)
                    ->orWhere('member_id', auth()->user()->id);
                    })->get();
        return $chat_rooms;
    }
    
    //チャットしている相手の取得
    public function chat_user($chat_rooms){
        $array = array();
        foreach($chat_rooms as $chatroom){
            if($chatroom->first_user_id != Auth::id()){
                $array[] = $chatroom->first_user_id;
            }else{
                $array[] = $chatroom->member_id;
            }
        }
        $sent_user_id = $array;
        return $sent_user_id;
    }
    
    //招待中のユーザーidの取得
    public function invited_user($event){
        $invited_users=$event->invited_users()->get();
        $array1 = array();
        foreach($invited_users as $invited_user){
            $array1[] = $invited_user->id;
        }
        $invited_user_id = $array1;
        return $invited_user_id;
    }
    
    public function registered_user($event){
        $registered_users=$event->invited_users()->get();
        $array1 = array();
        foreach($registered_users as $registered_user){
            $array1[] = $registered_user->id;
        }
        $registered_user_id = $array1;
        return $registered_user_id;
    }
    
    public function show(Event $event,User $user)
    {
        $chat_rooms = $this->my_chatroom($event);
        $sent_user_id = $this->chat_user($chat_rooms);
        //名簿登録済みのユーザーの取得
        $registered_user_id=$this->registered_user($event);
        //名簿登録済みユーザーからチャットしているユーザを取り除く
        $unsent_user_id=$registered_user_id;
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
    public function store(Request $request, Event $event, User $user, EventInvitation $event_invitation, Administrator $administrator, Member $member)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        //新規イベントの登録
        $input = $request['events'];//変数nputにリクエストインスタンスのevens配列を代入
        $input['user_id']=auth()->user()->id;//配列の追加を行っている。auth()はヘルパを参照
        $input['name']=auth()->user()->name;
        $event->fill($input)->save();//イベントモデルに変数inputの値を入れる
        //作成したイベントidの取得
        $created_event = Event::where('user_id', $input['user_id'])
        ->where('title', $input['title'])
        ->where('outline', $input['outline'])->first();
        //イベント作成者をイベント管理者に登録
        $input_administrator['user_id'] = $input['user_id'];
        $input_administrator['event_id'] = $created_event->id;
        $administrator->fill($input_administrator)->save();
        //イベント作成者をイベント参加者に登録
        $input_event_invitation['invited_user'] = $input['user_id'];
        $input_event_invitation['inviting_user'] = $input['user_id'];
        $input_event_invitation['event_id'] = $created_event->id;
        $input_event_invitation['invitation_status'] = 1;
        $event_invitation->fill($input_event_invitation)->save();
        //イベント作成者を名簿に登録
        $input_member['event_id'] = $created_event->id;
        $input_member['name'] = $input['name'];
        $input_member['user_id'] = $input['user_id'];
        $member->fill($input_member)->save();
        return redirect('/events/' . $event->id);
    }
    public function approve(Request $request, Event $event, EventInvitation $eventinvitation, User $user)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        if($user->check_member())
        {
            $matchThese = ['event_id' => $request['inviting'], 'invited_user' => auth()->user()->id];
            $eventinvitation = EventInvitation::where($matchThese)->first();
            $eventinvitation->invitation_status = 1;
            $eventinvitation->save();
            return redirect('/events');
        }
        else{
            return redirect('/events')->with('flash_message', '名簿にあなたの名前が無いためイベントに参加できません。このイベントの幹事に問い合わせてください。');
        }
    }
    
    public function delete(Event $event)
    {
      $event->delete();
      return redirect('events');
    }
    
    public function participate(Request $request, Event $event)
    {
        $eventinvitation = EventInvitation::where('event_id', $request['eventinvitations'])
        ->where('invited_user', auth()->user()->id)->first();
        $eventinvitation->paticipation_status = 1;
        $eventinvitation->save();
        $event_id_array = $request['eventinvitations'];
        $event_id = $event_id_array['event_id'];
        return redirect('/events/' . $event_id);
    }
    
    public function nonparticipate(Request $request, Event $event)
    {
        $eventinvitation = EventInvitation::where('event_id', $request['eventinvitations'])
        ->where('invited_user', auth()->user()->id)->first();
        $eventinvitation->paticipation_status = 0;
        $eventinvitation->save();
        $event_id_array = $request['eventinvitations'];
        $event_id = $event_id_array['event_id'];
        return redirect('/events/' . $event_id);
    }
}
?>
