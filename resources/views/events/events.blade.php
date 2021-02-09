@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9 offset-sm-3">
            <a href="{{route('events.create', ['user' => Auth::user()->id])}}" class="mt-2 mb-2 font-weight-bold">新規作成</a>
            <hr>
            <table class="table table-hover table-borderless table-sm">
                <tbody>
                     @foreach ($events as $key => $event)
                        <tr>
                            <td>{!! link_to_route('events.edit', $event->name, ['event' => $event->id]) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection