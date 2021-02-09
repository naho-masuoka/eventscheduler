@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-6 offset-sm-3">
    
    <div class="d-flex bd-highlight align-middle">
      <div class="p-2 flex-fill bd-highlight">
        <a href="{!! route('events.edit',  ['event' => $event->id]) !!}">戻る</a>
      </div>
    
      <div class="p-2 flex-fill bd-highlight text-right">
        <a href="{{ route('sendmail', ['id' => $event->id]) }}">送信</a>
      </div>
    </div>
  
    <div>
      <div class="p-2 flex-fill bd-highlight text-center font-weight-bold">
        <p>{{$event->name}}</p>
      </div>
    <table class="table table-hover">
      <tbody>
        <tr>
          <th style:"width:20px;"><small>Bcc:</small></th>
          <td>
              @if(count($members) >0 )
                @foreach($members as $member)
                  {{$member->name}}:{{$member->email}} ; 
                @endforeach
              @endif
            </td>
          </tr>
        <tr>
          <th style:"width:20px;"><small>送信元</small></th>
          <td>{!! $user->name !!}:{!! $user->email !!}</td>
        </tr>
          <th style:"width:20px;"><small>件名</small></th>
          <td>{{$event->title}}</td>
        </tr>
    
        <tr>
          <th style:"width:20px;"><small>イベント内容</small></th>
          <td>
            {!! nl2br($event->content) !!}
          </td>
        </tr>
        <tr>
          
      </tbody>
    </table>
    </div>
      </div>
@endsection