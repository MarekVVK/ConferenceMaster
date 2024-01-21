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

        <div class="row mt-4 d-flex justify-content-center">
            @if(Auth::check())
                @if(Auth::user()->role == 'client')
                    <a href="/client/conferenceslist" class="btn btn-primary"><span class="btn-sm">Client Dashboard</span></a>
                @elseif(Auth::user()->role == 'employee')
                    <a href="/employee/conferenceslist" class="btn btn-success"><span class="btn-sm">Employee Dashboard</span></a>
                @elseif(Auth::user()->role == 'admin')
                    <a href="/admin" class="btn btn-danger"><span class="btn-sm">Admin Dashboard</span></a>
                @endif
            @endif
        </div>
    </div>
@endsection
