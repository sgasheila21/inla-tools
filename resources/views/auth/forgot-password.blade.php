@extends('layouts.template')
@section('title', 'Forgot Password')

@section('content')
<div class="container my-5 p-5 shadow" style="width: 100vh;">
    <div class="text-center mb-4">
        <h4>Forgot Password</h4>
    </div>
    <form method="POST" action="{{ route('forgot.password.action') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label text-center">Please enter your email below. We will provide a form for you to reset your password.</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Input your email here" value="{{ old('email') }}">
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
            <button type="submit" class="btn text-white rounded-pill px-5" style="background-color: #00A099">Reset</button>
        </div>
    </form>
</div>
@endsection