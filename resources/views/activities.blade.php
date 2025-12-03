@extends('layout')
@section('content')
<main class="d-flex flex-column m-auto" style="min-width: 60%;">
    <h1 class="h-2">Your activities list:</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($c = 1)
            @foreach($activities as $activity)
            <tr>
                <th scope="row">{{ $c }}</th>
                <td>{{$activity->name}}</td>
                <td>{{$activity->description}}</td>
                <td>
                    <a class="me-2" href="{{url('activities/edit/'.$activity->id)}}">Редактировать</a>
                    <a href="{{url('activities/delete/'.$activity->id)}}">Удалить</a>
                </td>
            </tr>
            @php($c++)
            @endforeach
        </tbody>
    </table>
    {{$activities->links()}}
</main>
@endsection