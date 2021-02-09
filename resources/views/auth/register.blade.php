@extends('layouts.login')

@section('content')
    <div class="form-wrapper">
        <h1 class="pt-5 pb-3">Sign up</h1>
        {!! Form::open(['route' => 'signup.post']) !!}
        @csrf
            <div class="form-group">
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder'=> 'name']) !!}
            </div>
            <div class="form-group">
                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder'=> 'email']) !!}
            </div>

            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder'=> 'Password']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード再入力') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=> 'Password']) !!}
            </div>
            <div class="button-panel pb-2">
            {!! Form::submit('Sign up', ['class' => 'button']) !!}
            </div>
        {!! Form::close() !!}
        <div class="form-footer">
         <p class="text-center"><a href="{!! route('login') !!}">login ?</a></p>
        </div>
    </div>
@endsection