<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{{$user ? "Список сессий пользователя ".$user->name : ' Неверный ID пользователя' }}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Занятие</td>
            <td>Время начала</td>
            <td>Время конца</td>
        </thead>
        @foreach ($user->sessions as $session)
            <tr>
                <td>{{$session->id}}</td>
                <td>{{$session->activity->name}}</td>
                <td>{{$session->start_time}}</td>
                <td>{{$session->end_time}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>