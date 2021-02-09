@extends('layouts.app')

@section('content')
    @if(Auth::check())
    
        @include('events.events')
    @else
        @include('auth.login')
    @endif
@endsection
