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
        <h1 class="title">
            {{ $events->title }}
        </h1>
        <div class="outline">
            <div class="outline__post">
                <p>{{ $events->outline }}</p>    
            </div>
        </div>
        <div class="content">
            <div class="content__post">
                <p>{{ $events->body }}</p>    
            </div>
        </div>
        <form action="/admin" method="post">
            {{ csrf_field() }}
            <div class ="user_id">
                <select name="administrators[user_id]">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            @dd($events)//こちらで指定した値を送りたい
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>