@extends('layouts.app')

@section('content')
 
    <h3 class="text-center mt-5">ありがとうございました！</h3>

    @if($flg == 2)
        <h5 class="text-center mt-5">当日会えることを楽しみにしてます！</h5>
    @endif
    
    @if($flg == 3)
        <h5 class="text-center mt-5">またの機会に！</h5>
    @endif

@endsection