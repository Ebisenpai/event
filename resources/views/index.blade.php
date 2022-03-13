<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("header")
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">
        <div class="row">
            <form action="/logout" method="post" style="text-align: right">
                {{ csrf_field() }}
                <input type="submit" value="logout"/>
            </form>
        <!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <div class="bg-danger">
                {{session('flash_message' )}}
            </div>
        @endif
        <div class="col-sm-6">
                <h2>イベント一覧</h2>
                <div class="block">
                    @foreach (Auth::user()->joined_events()->get() as $event){{--eventsは複数データが入っていて$eventが単一のデータ--}}
                        <div class="border border-2 mb-1 p-1">
                            <a href='/events/{{$event->id}}' class="text-dark"><h2 class='title'>{{ $event->title }}</h2></a>
                            <p class='outline'>{{ $event->outline}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <h2>作成したイベント</h2>

                    <div class="block">
                        @foreach (Auth::user()->created_events()->get() as $event)  {{--eventsは複数データが入っていて$eventが単一のデータ--}}
                            <div class="border border-2 mb-1 p-1">
                                <a href='/events/{{$event->id}}' class="text-dark"><h2 class='title'>{{ $event->title }}</h2></a>
                                <p class='outline'>{{ $event->outline}}</p>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn btn-primary" href='/events/create'>イベント作成</a>
                    
            </dev>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6">
                <h2>招待</h2>

                <div class='events'>
                    @foreach (Auth::user()->invited_events()->get() as $event){{--eventsは複数データが入っていて$eventが単一のデータ--}}
                        <div class="border border-2 mb-1 p-1">
                            <h2 class='title'>{{ $event->title }}</h2>
                            <p class='outline'>{{ $event->outline}}</p>
                            <form action="/events/approve" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name='inviting[event_id]' value={{$event->id}}>
                                <input type="submit" value="承諾"/>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
    @include("footer")
    </body>
</html>