<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&family=Comfortaa:wght@600&display=swap" rel="stylesheet">
        <style>
            .btn12 {
                padding: 0.6em 0.88em;
                background-color: linear-gradient(to right, #e66465 50%, #fff 50%);
                background-size: 200% 100.5%;
                background-position: right bottom;
                color: #020202;
                border: none;
                border-top: 0.30em solid #00AA90;
                border-bottom: 0.30em solid #F7D94C;
                box-shadow: 3px 3px 2px rgba(0,0,0,0.08);
            }
            .hidden_box{
                height:0px;
            }
        </style>
    </head>
    <body>
        {{$member->name}}様</br></br>
        <hr>
        <p>{{$event->name}}</p>
        <p>{!! $event->content !!}</p>
        <form action = "https://eventschedulers.herokuapp.com/event_join?event_id={{$event->id}}&member_id={{$member->id}}&event_flg=2" method = "post">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-4">参　加</button>
            </div>
            <input type = "hidden" name ="event_id" value="{{$event->id}}" class="hidden_box"><br/>
            <input type = "hidden" name ="member_id" value="{{$member->id}}" class="hidden_box"><br/>
            <input type = "hidden" name ="event_flg" value="2" class="hidden_box"><br/>
        </form>
        <form action = "https://eventschedulers.herokuapp.com/event_join?event_id=1&member_id=1&event_flg=3" method = "post">
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-2 mb-4">不参加</button>
            </div>
            <input type = "hidden" name ="event_id" value="{{$event->id}}" class="hidden_box"><br/>
            <input type = "hidden" name ="member_id" value="{{$member->id}}" class="hidden_box"><br/>
            <input type = "hidden" name ="event_flg" value="3" class="hidden_box"><br/>
        </form>
    </body>
</html>