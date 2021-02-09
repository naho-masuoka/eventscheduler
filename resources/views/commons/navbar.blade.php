 <nav class="navbar">
     <a href="/" class="nav-bland ml-2" style="font-weight:bold">Scheduler</a>
    @if(Auth::check())
        <a class="nav-item nav-link" href="{!! route('events.index', ['user' => Auth::user()->id]) !!}">イベント</a>
        <a class="nav-item nav-link" href="{!! route('friends.create') !!}">友達</a>
        <div class="float-end">
            <a class="list-inline-item" href="{!! route('users.update',['user' => Auth::user()->id]) !!}">
                <img class="rounded-circle mr-3" src="{{ Gravatar::get(Auth::user()->email, ['size' => 30]) }}" alt="">
            </a>
            <a class="list-inline-item mr-1" href="{!! route('logout.get') !!}"><i class="fas fa-sign-out-alt fa-lg"></i></a>
        </div>
    @endif
</nav>