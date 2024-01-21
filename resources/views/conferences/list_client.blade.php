@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client Dashboard</h1>
        <div class="list-group">
            @foreach ($conferences as $conference)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <h5>{{ $conference->title }}</h5>
                    <div class="btn-group" role="group">
                        <a href="{{ route('conferences.view', $conference) }}" class="btn btn-primary btn-sm">View</a>
                        @if (Auth::user()->isRegisteredForConference($conference))
                            <form action="{{ route('unregister.conference', $conference->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Unregister</button>
                            </form>
                        @else
                            <a href="{{ route('register.conference', $conference->id) }}" class="btn btn-success btn-sm">Register</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
