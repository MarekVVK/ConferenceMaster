@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Conferences Dashboard</h1>
        <a href="{{ route('admin.admin_conferences_create') }}" class="btn btn-success mb-3">Create new conference</a>

        <div class="row">
            @foreach ($conferences as $conference)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $conference->title }}</h5>

                            <a href="{{ route('conferences.view', $conference) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('admin.admin_conferences_edit', $conference->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                            <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-conference">Delete</button>
                            </form>

                            <a href="{{ route('conferences.view.registrations', $conference->id) }}" class="btn btn-secondary btn-sm">View Registered Users</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-conference');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    if (!confirm('Are you sure you want to delete this conference?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>

@endsection
