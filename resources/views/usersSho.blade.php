<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>{{$user ? "Список активностей пользователя ".$user->name : ' Неверный ID пользователя' }}</h2>
    @if($user)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
        </thead>
        @foreach ($user->activities as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>
                <td>{{$activity->description}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>