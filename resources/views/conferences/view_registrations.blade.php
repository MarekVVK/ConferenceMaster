@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registered Users for Conference: {{ $conference->title }}</h1>
        <ul class="list-group">
            @foreach ($registrations as $user)
                <li class="list-group-item">{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    </div>
@endsection
