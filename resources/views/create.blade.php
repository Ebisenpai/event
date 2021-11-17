<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include("header")   
        <meta charset="utf-8">
        <title>Events</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
    <div class="px-3" style="color: black; background-color: white;">    
        <h1>イベント作成</h1>
        <div class="pt-5">
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
        </div>    
        <div class="back">[<a href="/events">戻る</a>]</div>
    </div>    
    @include("footer")
    </body>
</html>