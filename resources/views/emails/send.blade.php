<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Event Schedules</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
            
        </style>
    </head>
    <body>
        <div>
         <p class="mt-2 mb-2">{{$member->name}} 様</p>
        </div>
        <table class="table table-borderless table-sm">
            <tbody>
                <tr>
                    <td　colspan="2"><p>{!! nl2br($event->content) !!}</p></td>
                </tr>
                
                <tr>
                    <td style="width:20%;">場所</td>
                    <td style="width:80%;"><p class="text-left">{{$event->place}}</p></td>
                </tr>
                <tr>
                    <td style="width:20%;">時間</td>
                    <td style="width:80%;"><p class="text-left">{{$event->schedule}}</p></td>
                </tr>
                
            </tbody>
        </table>

        
 
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>