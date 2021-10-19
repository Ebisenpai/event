<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Events</title>
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">    
        <h1>Event Name</h1>
        <form action="/events" method="post">
            {{ csrf_field() }}
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="events[title]" placeholder="タイトル"/>
            </div>
            <div class="outline">
                <h2>outline</h2>
                <textarea name="events[outline]" placeholder="概要"/></textarea>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="events[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </div>    
    </body>
</html>