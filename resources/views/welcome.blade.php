@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Conference Management System</h1>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <p>Student Name: Marek Stankovskij</p>
                        <p>Group: PIT-20-I-NT</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <h2>Access Different Roles</h2>
            <div class="btn-group mt-3" role="group" aria-label="Basic example">
                <a href="/conferenceslist" class="btn btn-primary">Client Dashboard</a>
                <a href="/employee" class="btn btn-success">Employee Dashboard</a>
                <a href="/admin" class="btn btn-danger">Admin Dashboard</a>
            </div>
        </div>
    </div>
@endsection
