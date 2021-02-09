@extends('layouts.login')

@section('content')
    <div class="form-wrapper">
    <h1 class="pt-5 pb-3">Log In</h1>
    {!! Form::open(['route' => 'login.post']) !!}
    @csrf
        <div class="form-group">
            {!! Form::label('email', 'Email',['class' => 'text-left']) !!}
            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password',['class' => 'logitem']) !!}
            {!! Form::password('password', ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="button-panel">
        {!! Form::submit('Log in', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  <div class="form-footer">
    <p><a href="{!! route('signup.get') !!}">Create an account</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
</div>
  
@endsection