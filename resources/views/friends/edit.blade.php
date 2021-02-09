@extends('layouts.app')

@section('content')
    @if(isset($flash))
        <div class="alert alert-light text-center alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong> {{$flash}}</strong> 
        </div>
    @endif    
    
    {!! Form::model($person, ['route' => ['friends.update', $person->id], 'method' => 'put']) !!}
       @csrf
       <div class="d-flex bd-highlight align-middle">
           <div class="p-2 flex-fill bd-highlight">
                <a onclick="history.back()" class="btn b-up">戻る</a>
                </div>

            <div class="p-2 flex-fill bd-highlight text-right">
                <button type="submit" class="btn b-up mb-1">更新</button>
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="name" value="{{$person->name}}" class="form-control"placeholder="name">
        </div>

        <div class="form-group">
            <input type="email" name="email" value="{{$person->email}}" class="form-control"placeholder="email">
        </div>
    {!! Form::close() !!}
    <div class="p-2 flex-fill bd-highlight text-left">
        <a class="nav-link" href="{!! route('friends.create') !!}"><i class="fas fa-plus"></i>お友達追加</a>
    </div>
    <table class="table table-hover table-borderless table-sm mt-2">
        <thead>
            <tr>
                <th style:"width:30%;" scope="col">名前</th>
                <th style:"width:70%;" scope="col">E-mai</th>
            </tr>
        </thead>
        @foreach ($friends as $key => $friend)
            <tbody>
                <tr>
                    <td>{!! link_to_route('friends.edit', $friend->name, ['friend' => $friend->id]) !!}</a>
                    <td><small>{{$friend->email}}</small></td>
                </tr>
            </tbody>
            @endforeach
            
    </table>
@endsection