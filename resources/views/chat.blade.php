<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("header")
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>メッセージ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">
        <h2>メッセージ</h2>
        <div class='chat'>
            @foreach ($chatroom->chats()->get() as $chat)
                <h4 class='message'>{{ $chat->user_name()}} : {{$chat->message }}</h4>{{--新着メッセージのみ--}}
            @endforeach
        </div>
        {{--
        <form action="/chats" method="post">
            {{ csrf_field() }}
            <input type="hidden" name='chats[chat_room_id]' value={{$chatroom->id}}>
            <div class="message">
                <textarea name="chats[message]" placeholder="メッセージを入力"></textarea>
            </div>
            <input type="hidden" name='chats[send_user_id]' value={{Auth::user()->id}}>
            <input type="hidden" name='chats[event_id]' value={{$events->id}}>--}}
            {{--チャットルームの作成機能とhiddenでの情報の送信--}}
            {{--<input type="submit" value="送信"/>
        </form>
        --}}
        <a href="/events/{{$events->id}}">戻る</a>
    </div>
    @include("footer")
    </body>
</html>