@extends('layouts.app')

@section('content')
    <div class="d-flex bd-highlight align-middle">
        <div class="p-2 flex-fill bd-highlight">
            <a onclick="history.back()" class="btn b-up">戻る</a>
        </div>
        <div class="p-2 flex-fill bd-highlight text-right">
            <a href="{{route('mails.create')}}" class="btn b-up">メール作成</a>
        </div>
  　 </div>
    
    <table class="table table-borderless table-sm">
        <thead>
            <tr>
                <th colspan="2">{{$event->name}}のメール</th>
            </tr>
        </thead>
        @foreach ($mails as $key => $mail)
            <tbody>
                <tr>
                    <td style="width:20px"><a href="{!! route('email.copy', ['id' => $mail->id]) !!}"><i class="far fa-clone"></i></a></td>
                    <td>{!! link_to_route('mails.edit', $mail->caption, ['mail' => $mail->id]) !!}</td>
                </tr>
        </tbody>
        @endforeach
        </table>
    
        <table class="table table-borderless table-sm mt-2">
        <thead>
            <tr>
                <th colspan="2">メールひな形</th>
            </tr>
        </thead>
        @if(count($samplemails) > 0)
            @foreach ($samplemails as $samplemail)
                <tbody class="table-striped">
                    <tr>
                        <td style="width:20px"><a href="{!! route('email.copy', ['id' => $samplemail->id]) !!}"><i class="far fa-clone"></i></a></td>
                        <td>{!! link_to_route('mails.edit', $samplemail->caption, ['mail' => $samplemail->id]) !!}</td>
                    </tr>
                </tbody>
            @endforeach
        @endif
    </table>
 
@endsection