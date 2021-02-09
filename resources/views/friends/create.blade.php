@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'friends.store']) !!}
        @csrf
        <div class="d-flex bd-highlight align-middle">
            <div class="p-2 flex-fill bd-highlight">
                <a onclick="history.back()" class="btn b-up">戻る</a>
            </div>
                    
            <div class="p-2 flex-fill bd-highlight text-right">
                <button type="submit" class="btn b-up mb-1">作成</button>
            </div>
        </div>
        
        <div class="form-group">
            <input type="text" name="name" class="form-control"placeholder="name">
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control"placeholder="E-mail">
        </div>
    {!! Form::close() !!}

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
            @endforeach
        </tbody>
    </table>

@endsection