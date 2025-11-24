<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Добавление сессии</h2>
    <form method="post" action={{url('sessions/create/store')}}>
        @csrf
        <label>Пользователь:</label>
        <select name="user_id" value="{{ old('user_id') }}">
            <option style="...">
            @foreach ($users as $user)
                <option value="{{$user->id}}"
                    @if(old('user_id') == $user->id) selected
                    @endif>{{$user->name}}
                </option>
            @endforeach
        </select>
        @error('user_id')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    <br>
        <label>Занятие:</label>
        <select name="activity_id" value="{{ old('activity_id') }}">
            <option style="...">
            @foreach ($activities as $activity)
                <option value="{{$activity->id}}"
                    @if(old('activity_id') == $activity->id) selected
                    @endif>{{$activity->name}}
                </option>
            @endforeach
        </select>
        @error('activity_id')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
    <br>
        <label>Время начала:</label>
        <input type="datetime-local" name="start_time" value="{{ old('start_time') }}"/>
        @error('start_time')
        <div calss="is-invalid">{{ $message }}</div>
        @enderror
    <br>
        <label>Время конца:</label>
        <input type="datetime-local" name="end_time" value="{{ old('end_time') }}"/>
        @error('end_time')
        <div calss="is-invalid">{{ $message }}</div>
        @enderror
    <br>
        <input type="submit">
    </form>
</body>
</html>