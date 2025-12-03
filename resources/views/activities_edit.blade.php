@extends('layout')
@section('content')
<main class="d-flex flex-column m-auto w-75">
    <h2 class="mb-3">Changing '{{$activity->name}}' activity:</h2>
    <form method="post" action="{{url('activities/update/'.$activity->id)}}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">New name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="name">New description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" rows="4"></textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</main>
@endsection