@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Dashboard</h1>
        <div class="list-group">
            @foreach ($conferences as $conference)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <h5>{{ $conference->title }}</h5>
                    <!-- Other conference details -->
                    <div>
                        <a href="{{ route('conferences.view', $conference) }}" class="btn btn-primary btn-sm me-2">View</a>
                        <a href="{{ route('conferences.view.registrations', $conference->id) }}" class="btn btn-secondary btn-sm">View Registered Users</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
