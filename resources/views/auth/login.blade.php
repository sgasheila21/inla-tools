@extends('layouts.template')
@section('title', 'Login')

@section('content')
<div class="container my-5 p-5 shadow" style="width: 100vh;">
    <div class="text-center mb-4">
        <h4>User Information</h4>
    </div>
    <form method="POST" action="{{ route('login.auth') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail<span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Input your email here" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="passwords" name="passwords" placeholder="Input your password here" aria-describedby="forgotPassword" value="{{ old('passwords') }}">
            <div id="forgotPassword" class="form-text"><a href="{{ route('forgot.password') }}">Forgot Password?</a></div>
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
            <button type="submit" class="btn text-white rounded-pill px-5" style="background-color: #00A099">Login</button>
            <label class="form-label">Don’t have an account? Register <a href="{{ route('register') }}">here</a></label>
        </div>
    </form>
</div>
@endsection