@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Meetings List</title>
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

<h2>Meetings List</h2>

<table id="meetings-table" class="display">
    <thead>
        <tr>
            <th>Name</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#meetings-table').DataTable({
            ajax: {
                url: '/api/meetingsList',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-XSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataSrc: ''
            },
            columns: [
                { data: 'name' },
                { data: 'start_time' },
                { data: 'end_time' }
            ]
        });
    });
</script>

</body>
</html> -->
