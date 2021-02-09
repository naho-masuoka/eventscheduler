@extends('layouts.app')

@section('content')
    <div class="d-flex bd-highlight align-middle">   

        <div class="p-2 flex-fill bd-highlight text-center">
            <a class="mt-2 mb-2">{!! link_to_route('events.edit', $event->name.' へ戻る', ['event' => $event->id]) !!}</a>
        </div>
    </div>
     <table class="table table-borderless table-sm">
        <thead>
            <tr><th colspan="5">参加メンバー</th></tr>
        </thead>
        
        @if (count($join_members) > 0)
            <tbody>
                @foreach ($join_members as $join_member)
                    <tr>
                        <td style="width:30px"><small>{!! link_to_route('unfollow', '不参加', ['eventID' => $event->id,'frinedID' => $join_member->id]) !!}</small></td>
                        <td style="width:30px"><small></small></td>
                        <td style="width:200px">{!! $join_member->name !!}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    <br>
    <table class="table table-borderless table-sm">
        <thead>
            <tr><th colspan="5">招待メンバー</th></tr>
        </thead>
        @if (count($invite_members) > 0)
            <tbody>
                @foreach ($invite_members as $invite_member)
                    <tr>
                        <td style="width:30px"><small>{!! link_to_route('unfollow', '不参加', ['eventID' => $event->id,'frinedID' => $member->id]) !!}</small></td>
                        <td style="width:30px"><small></small></td>
                        <td style="width:200px">{!! $invite_member->name !!}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    <br>
    <table class="table table-borderless table-sm"> 
        <thead>
            <tr><th colspan="5">メンバー以外のお友達</th></tr>
        </thead>
    @if (count($unmembers) > 0)
        <table class="table table-borderless table-sm">
            <tbody>
            @foreach ($unmembers as $unmember)
                <tr>
                    <td style="width:30px"><small>{!! link_to_route('follow', '招待', ['eventID' => $event->id,'frinedID' => $unmember->id]) !!}</small></td>
                    <td style="width:30px"><small>{!! link_to_route('join', '参加', ['eventID' => $event->id,'frinedID' => $unmember->id]) !!}</small></td>
                    <td style="width:200px">{!! $unmember->name !!}</td>
                </tr>
            @endforeach
            </tbody>
        
    @endif 
    </table>
@endsection