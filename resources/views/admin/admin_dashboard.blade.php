@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row text-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <a href="/admin/conferences" class="card-body text-decoration-none">
                        <h5 class="card-title text-primary">Manage Conferences</h5>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <a href="/admin/users" class="card-body text-decoration-none">
                        <h5 class="card-title text-info">Manage Users</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
