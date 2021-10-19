<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Events</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">    
        <div class="row">
            <div class="col-sm-12">
                <p align="left">
                    <h1 class="title">
                        {{ $events->title }}
                    </h1>
                </p>
                <p align="left">
                    <div class="outline">
                        <div class="outline__post">
                            <p>{{ $events->outline }}</p>    
                        </div>
                    </div>
                </p>    
                <p align="left">    
                    <div class="content">
                        <div class="content__post">
                            <p>{{ $events->body }}</p>    
                        </div>
                    </div>
                </p>    
                @if($events->creatorCheck())
                <form action="/admin/" method="post">
                    {{ csrf_field() }}
                    管理者の追加
                    <div class ="selection">
                        <select name="administrators[user_id]">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name='administrators[event_id]' value={{$events->id}}>
                    <input type="submit" value="保存"/>
                </form>
                @endif
                @if($events->adminCheck())
                <form action="/invite" method="post">
                    {{ csrf_field() }}
                    イベント招待
                    <div class ="selection">
                        <select name="eventinvitations[invited_user]">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name='eventinvitations[event_id]' value={{$events->id}}>
                    <input type="submit" value="保存"/>
                </form>
                @endif
                <div class="footer">
                    <a href="/">戻る</a>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h2>Chat rooms</h2>
                @foreach ($chat_rooms as $chatroom){{--user1かuse2に自分が入っている場合のみ--}}
                    <div class='chatroom'>
                        <a href='/events/{{$events->id}}/{{$chatroom->id}}'>{{$chatroom->partner()}}:{{$chatroom->latest_chat()}}</a>
                    </div>
                @endforeach
                
            </div>{{--新規メッセージ送信--}}
            <div class="col-sm-6">
                <form action="/firstchats" method="post">
                    {{ csrf_field() }}
                    <div class="user">
                        <h2>New message</h2>
                        <select name="chats[receiver_id]" id="user2">
                            @foreach($unsent_user_id as $unsent_user_id)
                                <option value="{{$user->get()[$unsent_user_id-1]->id}}">{{--idが取得できなかったため配列のidで代用--}}
                                    {{$user->get()[$unsent_user_id-1]->name}}
                                </option>    
                            @endforeach
                        </select>
                    </div>
                    <div class="message">
                        <textarea name="chats[message]" placeholder="久しぶり。"></textarea>
                    </div>
                    <input type="hidden" name='chats[send_user_id]' value={{Auth::user()->id}}>
                    <input type="hidden" name='chats[event_id]' value={{$events->id}}>
                    {{--チャットルームの作成機能とhiddenでの情報の送信--}}
                    <input type="submit" value="保存"/>
                </form>
            </div>
        </div>
    </div>    
    </body>
</html>