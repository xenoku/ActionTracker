@extends('layout')
@section('content')
<main class="d-flex m-auto w-50">
    <form class="w-100" method="post" action={{url('sessions/new')}}>
        @csrf
        <label for="activity_id" class="form-label">Your current activity:</label>
        <div class="d-flex">
            <select class="form-select me-1" id="activity_id" name="activity_id" onchange="this.form.submit()">
                @foreach ( auth()->user()->activities() as $activity)
                    <option value="{{ $activity->id }}" data-bs-toggle="tooltip" title="{{$activity->description}}"
                    @if (auth()->user()->sessions->last())
                        @if (auth()->user()->sessions->last()->activity->id == $activity->id) selected @endif
                    @else
                        @if ($activity->id == 1) selected @endif
                    @endif>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
            <a class="btn btn-dark rounded-circle" href="activities/new" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </a>
        </div>
    </form>
</main>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endsection
