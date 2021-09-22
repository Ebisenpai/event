<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="col-sm-6">
                <h1>Event Name</h1>
                <div class='events'>
                    @foreach ($events as $event){{--eventsは複数データが入っていて$eventが単一のデータ--}}
                        <div class='event'>
                            <a href='/events/{{$event->id}}'><h2 class='title'>{{ $event->title }}</h2></a>
                            <p class='outline'>{{ $event->outline}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <h1>Created Event Name</h1>
                    <a class="btn btn-primary" href='/events/create'>create</a>
                    <div class='events'>
                        @foreach (Auth::user()->created_events()->get() as $event)  {{--eventsは複数データが入っていて$eventが単一のデータ--}}
                            <div class='event'>
                                <a href='/events/{{$event->id}}'><h2 class='title'>{{ $event->title }}</h2></a>
                                <p class='outline'>{{ $event->outline}}</p>
                            </div>
                        @endforeach
                    </div>
            </dev>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1>Event Invitations</h1>
                <div class='events'>
                    @foreach (Auth::user()->invited_events()->get() as $event){{--eventsは複数データが入っていて$eventが単一のデータ--}}
                        <div class='event'>
                            <h2 class='title'>{{ $event->title }}</h2>
                            <p class='outline'>{{ $event->outline}}</p>
                            <a class="btn btn-primary" href='/events/approve'>承諾</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <h1>Created Event Name</h1>
                    <div class='events'>
                        @foreach (Auth::user()->admin_events()->get() as $event)  {{--eventsは複数データが入っていて$eventが単一のデータ--}}
                            <div class='event'>
                                <a href='/events/{{$event->id}}'><h2 class='title'>{{ $event->title }}</h2></a>
                                <p class='outline'>{{ $event->outline}}</p>
                            </div>
                        @endforeach
                    </div>
                
            </dev>
        </div>
    </body>
</html>