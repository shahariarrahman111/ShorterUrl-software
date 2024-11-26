@extends('layouts.app')

@section('content')

<div id="register" class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow" style="width: 600px; margin: 30px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Register</h2>
            <form id="registerForm" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf  

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="img" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="img" name="img" accept="image/*">
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>

                <div class="d-flex justify-content-between">
                   <p>Already have an account? Login<a href="{{ route('login.form') }}" class="text-decoration-none"></a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
