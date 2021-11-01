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
                <h2>イベント名</h2>
                <input type="text" name="events[title]" placeholder="タイトル"/>
            </div>
            <div class="outline">
                <h2>概要文</h2>
                <textarea name="events[outline]" placeholder="概要" cols="40" rows="3" wrap="hard"></textarea>
            </div>
            <div class="body">
                <h2>詳細</h2>
                    <h4>日時</h4>
                        <textarea name="events[date]" cols="40" rows="1" wrap="hard"></textarea>
                    <h4>場所</h4>
                        <textarea name="events[place]"  cols="40" rows="1" wrap="hard"></textarea>
                    <h4>費用</h4>
                        <textarea name="events[cost]"  cols="40" rows="1" wrap="hard"></textarea>
                    <h4>回答期限</h4>
                        <textarea name="events[time_limit]"  cols="40" rows="1" wrap="hard"></textarea>
                    <h4>その他</h4>
                        <textarea name="events[others]"  cols="40" rows="1" wrap="hard"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/events">戻る</a>]</div>
    </div>    
    </body>
</html>