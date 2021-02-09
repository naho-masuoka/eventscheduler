@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-6 offset-2">
            {!! Form::model($event, ['route' => ['events.update', $event->id], 'method' => 'put']) !!}
            @csrf
                <div class="d-flex bd-highlight align-middle">   
                    <div class="p-2 flex-fill bd-highlight">
                        <a href="{{route('events')}}" class="font-weight-bold">戻る</a>
                    </div>
                    <div class="p-2 flex-fill bd-highlight text-right">
                        <button type="submit" class="b-up mb-1 font-weight-bold">更新</button>
                    </div>
                </div>
                @if (count($invite_members) > 0)
                    <div class="text-center mb-1">
                        {!! link_to_route('invite_preview', '招待 Mail', ['id' => $event->id], ['class' => 'btn btn-lg btn-info mr-2']) !!}
                        @if (count($join_members) > 0)
                            {!! link_to_route('preview', 'Mail preview', ['id' => $event->id], ['class' => 'btn btn-lg btn-info']) !!}
                        @endif
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" name="name" value="{{$event->name}}" class="form-control" placeholder="イベント名">
                </div>
                <div class="form-group">
                    <input type="text" name ="place" value="{{$event->place}}" class="form-control" placeholder="開催場所">
                </div>
                <div class="form-group">
                    <input type="datetime-local" name ="schedule" value="{{\Carbon\Carbon::parse($event->schedule)->format('Y-m-d\TH:i')}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name ="title" class="form-control" placeholder="件名">
                </div>
                <div class="form-group">
                    <textarea name="content" class="ckeditor form-control">{{$event->content}}</textarea>
                </div>
                <div class="form-group">
                    {!! link_to_route('members', 'メンバー招待', ['id' => $event->id], ['class' => 'btn btn-lg btn-success form-control']) !!}
                </div>
            {!! Form::close() !!}
        </aside>
        <div class="col-sm-4">
            <div class="text-center mt-2">
                <p class="font-weight-bold">イベントメンバー </p>
            </div>
            <table class="table table-borderless table-sm">
                <thead>
                    <tr><th colspan="5">参加メンバー</th></tr>
                </thead>
                <tbody>
                @if (count($join_members) > 0)
                        @foreach ($join_members as $join_member)
                            <tr>
                                <td style="width:40px"><small>{!! link_to_route('unfollow', 'cancel', ['eventID' => $event->id,'frinedID' => $join_member->id]) !!}</small></td>
                                <td style="width:40px"><small></small></td>
                                <td>{!! $join_member->name !!}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
        
            </table>
            <br>
            <table class="table table-borderless table-sm">
                <thead>
                    <tr><th colspan="5">招待メンバー</th></tr>
                </thead>
               
            <tbody>
                @if (count($invite_members) > 0)
                    @foreach ($invite_members as $invite_member)
                        <tr>
                            <td style="width:40px"><small>{!! link_to_route('unfollow', 'cancel', ['eventID' => $event->id,'frinedID' => $invite_member->id]) !!}</small></td>
                            <td style="width:40px"><small></small></td>
                            <td>{!! $invite_member->name !!}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
            <br>
            <table class="table table-borderless table-sm"> 
                <thead>
                    <tr><th colspan="5">メンバー以外のお友達</th></tr>
                </thead>
                <tbody>
                    @if (count($unmembers) > 0)    
                        @foreach ($unmembers as $unmember)
                            <tr>
                                <td style="width:40px"><small>{!! link_to_route('follow', '招待', ['eventID' => $event->id,'frinedID' => $unmember->id]) !!}</small></td>
                                <td style="width:40px"><small>{!! link_to_route('join', '参加', ['eventID' => $event->id,'frinedID' => $unmember->id]) !!}</small></td>
                                <td>{!! $unmember->name !!}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
       CKEDITOR.config.height=100;
       CKEDITOR.replace( 'content', {
        //ツールバーグループのカスタマイズ
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		    { name: 'forms', groups: [ 'forms' ] },
		    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		    { name: 'links', groups: [ 'links' ] },
		    { name: 'insert', groups: [ 'insert' ] },
            { name: 'styles', groups: [ 'styles' ] },
		    { name: 'colors', groups: [ 'colors' ] },
		    { name: 'tools', groups: [ 'tools' ] },
		    { name: 'others', groups: [ 'others' ] },
		    { name: 'about', groups: [ 'about' ] }
            ],
        //不要なボタンを削除
        removeButtons: 'Source,Save,NewPage,Print,Templates,' +
                        'Find,Replace,SelectAll,Scayt,Cut,Styles,Font,' +
                        'Copy,Paste,PasteText,PasteFromWord,BidiLtr,Smiley,' +
                        'BidiRtl,Language,Unlink,Anchor,Flash,Outdent,Indent,' +
                        'PageBreak,CreateDiv,RemoveFormat,CopyFormatting,' +
                        'Superscript,Subscript,Strike,Form,Checkbox,Radio,TextField,' +
                        'Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,About,SpecialChar',
        });
    </script>
@endsection