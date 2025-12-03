@extends('layout')
@section('content')
<main class="d-flex flex-column m-auto" style="min-width: 60%;">
    <h1 class="h-2">Your sessions list:</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Activity name</th>
                <th scope="col">Start time</th>
                <th scope="col">End time</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($c = 1)
            @foreach($sessions as $session)
            <tr>
                <th scope="row">{{$c}}</th>
                <td>{{$session->activity->name}}</td>
                <td>{{$session->start_time}}</td>
                <td>{{$session->end_time}}</td>
                <td><a href="{{url('sessions/delete/'.$session->id)}}">Удалить</a></td>
            </tr>
            @php($c++)
            @endforeach
        </tbody>
    </table>
    {{$sessions->links()}}
</main>
@endsection