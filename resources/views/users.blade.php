<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список пользователей:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Имя</td>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>