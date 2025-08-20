@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4 col-md-6 mx-auto mt-4">
    <h1 class="text-center text-primary mb-4">Admin Login</h1>
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
    </form>
</div>
@endsection
