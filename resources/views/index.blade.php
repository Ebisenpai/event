<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        @dd($user)
        <h1>Event Name</h1>
        <p class='create'>[<a href='/events/create'>create</a>]</p>
        <div class='events'>
            @foreach ($events as $event){{--eventsは複数データが入っていて$eventが単一のデータ--}}
                <div class='event'>
                    <a href='/events/{{$event->id}}'><h2 class='title'>{{ $event->title }}</h2></a>
                    <p class='outline'>{{ $event->outline}}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>