@extends('layouts.template')
@section('title', 'Register')

@section('content')
<div class="container my-5 p-5 shadow" style="width: 100vh;">
    <div class="text-center mb-4">
        <h4>User Information</h4>
    </div>
    <form method="POST" action="{{ route('register.auth') }}">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Input your full name here" value="{{ old('fullname') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Input your email here" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="passwords" name="passwords" placeholder="Input your password here" value="{{ old('passwords') }}">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Input your confirm password here" value="{{ old('confirmPassword') }}">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex flex-column align-items-center justify-content-center">
            <button type="submit" class="btn text-white rounded-pill px-5" style="background-color: #00A099">Register</button>
            <label class="form-label">Already have an account? Login <a href="{{ route('login') }}">here</a></label>
        </div>
    </form>
</div>
@endsection