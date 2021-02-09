@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      
      <div class="d-flex bd-highlight align-middle">
        <div class="p-2 flex-fill bd-highlight">
          <a onclick="history.back()" class="btn">戻る</a>
        </div>
        <div class="p-2 flex-fill bd-highlight text-right">
          <a href="{{ route('invite_sendmail', ['id' => $event->id]) }}" class="btn btn-success mt-2 mb-2">送信</a>
        </div>
    </div>
    
      <div class="text-center">
        <a href="{{ route('previewsample', []) }}"><button type="button" class="btn btn12 mb-4">ご参加希望の方はクリック！</button></a>
      </div>
      
      <div>
      <table class="table table-hover">
        <tbody>
          <tr>
            <th><small>Bcc:</small></th>
              <td>
                @if(count($members) >0 )
                  @foreach($members as $member)
                    {{$member->name}},
                  @endforeach
                @endif
              </td>
          </tr>
          <tr>
            <th><small>送信元</small></th>
            <td>{!! $user->name !!}</td>
          </tr>
            <th><small>イベント</small></th>
            <td>{{$event->name}}</td>
          </tr>
          <tr>
            <th><small>イベント内容</small></th>
            <td>{!! $event->content !!}</td>
          </tr>
      </tbody>
      </table>
    </div>
    </div>
  </div>
@endsection