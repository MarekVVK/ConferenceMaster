@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th>Title</th>
                <td>{{ $conference->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $conference->description }}</td>
            </tr>
            <tr>
                <th>Speakers</th>
                <td>{{ $conference->speakers }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td>{{ $conference->venue }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $conference->date }}</td>
            </tr>
            <tr>
                <th>Start time</th>
                <td>{{ $conference->start_time }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
