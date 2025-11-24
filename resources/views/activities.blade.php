<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список занятий:</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
        </thead>
        @foreach ($activities as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>
                <td>{{$activity->description}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>