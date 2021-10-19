<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>chat</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">
        <h1>Chat</h1>
        <div class='chat'>
            @foreach ($chatroom->chats()->get() as $chat)
                <h2 class='message'>{{ $chat->user_name()}} : {{$chat->message }}</h2>{{--新着メッセージのみ--}}
            @endforeach
        </div>
        <form action="/chats" method="post">
            {{ csrf_field() }}
            <input type="hidden" name='chats[chat_room_id]' value={{$chatroom->id}}>
            <div class="message">
                <textarea name="chats[message]" placeholder="久しぶり。"></textarea>
            </div>
            <input type="hidden" name='chats[send_user_id]' value={{Auth::user()->id}}>
            <input type="hidden" name='chats[event_id]' value={{$events->id}}>
            {{--チャットルームの作成機能とhiddenでの情報の送信--}}
            <input type="submit" value="送信"/>
        </form>
        <a href="/events/{{$events->id}}">戻る</a>
    </div>    
    </body>
</html>