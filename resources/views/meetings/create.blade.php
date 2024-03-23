@extends('layouts.app')

@section('content')


<div id="create-meeting-container">
    <h2>Create Meeting</h2>

    @if ($errors->any())
    <div class="error">
        <strong>{{ $errors->first() }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="error">
        <strong>{{ session('error') }}</strong>
    </div>
@endif

@if (session('success'))
    <div class="success">
        <strong>{{ session('success') }}</strong>
    </div>
@endif


    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Meeting Name:</label><br>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="start_time">Start Time:</label><br>
            <input type="datetime-local" id="start_time" name="start_time">
        </div>
        <div>
            <label for="end_time">End Time:</label><br>
            <input type="datetime-local" id="end_time" name="end_time">
        </div>
        <button type="submit">Create Meeting</button>
    </form>
</div>


@endsection
