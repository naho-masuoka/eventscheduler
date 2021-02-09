@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
        {!! Form::open(['route' => 'events.store']) !!}
        @csrf
        <div class="d-flex bd-highlight align-middle">
            <div class="p-2 flex-fill bd-highlight">
                <a onclick="history.back()" class="btn b-up">戻る</a>
            </div>
                    
            <div class="p-2 flex-fill bd-highlight text-right">
                <button type="submit" class="btn mb-1 b-up">登録</button>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="イベント名">
        </div>
        <div class="form-group">
            <input type="text" name ="place" class="form-control" placeholder="場所">
        </div>
        <div class="form-group">
            <input type="datetime-local" name ="schedule" value="{{\Carbon\Carbon::parse(now())->format('Y-m-d\TH:i')}}" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name ="title" class="form-control" placeholder="件名">
        </div>
        <div class="form-group">
            <textarea name="content" class="ckeditor form-control" rows="5" placeholder="メッセージ"></textarea>
        </div>
        {!! Form::close() !!}
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