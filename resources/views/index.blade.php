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
        <h1>Event Name</h1>
        <div class='events'>
            @foreach ($events as $event)
                <div class='event'>
                    <h2 class='title'>{{ $event->title }}</h2>
                    <p class='body'>{{ $event->body}}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>