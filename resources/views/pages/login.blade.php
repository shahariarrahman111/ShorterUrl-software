@extends('layouts.app')

@section('content')
<div id="fogins" class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 400px; margin-top: 100px">
        <div class="card-body">
            <h2 class="text-center mb-4">Login</h2>
            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf  
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>

            </form>
            <div class="text-start mt-3">
                <p>Don't have an account? <a href="{{ route('register.form') }}" class="text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
