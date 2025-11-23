<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список сессий:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Имя пользователя</td>
            <td>Название занятия</td>
            <td>Время начала</td>
            <td>Время конца</td>
        </thead>
        @foreach ($mySessions as $session)
            <tr>
                <td>{{$session->id}}</td>
                <td>{{$session->user->name}}</td>
                <td>{{$session->activity->name}}</td>
                <td>{{$session->start_time}}</td>
                <td>{{$session->end_time}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>