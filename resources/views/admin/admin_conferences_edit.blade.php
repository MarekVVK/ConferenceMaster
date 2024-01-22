@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Conference</h1>
        <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $conference->title }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $conference->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d', strtotime($conference->date)) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" id="venue" name="venue" value="{{ $conference->venue }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="start_time">Start Time</label>
                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $conference->start_time }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="speakers">Speakers</label>
                <textarea class="form-control" id="speakers" name="speakers" required>{{ $conference->speakers }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <div class="invalid-feedback" style="display: none;">
                Please fill out all required fields.
            </div>
        </form>
    </div>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            document.querySelector('.invalid-feedback').style.display = 'block';
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
