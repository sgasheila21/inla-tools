@extends('layouts.template')
@section('title', 'Change Password')

@section('content')
<div class="container my-5 p-5 shadow" style="width: 100vh;">
    <div class="text-center mb-4">
        <h4>Change Password</h4>
    </div>
    <form method="POST" action="{{ route('change.password.action') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            @if(auth()->check())
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
            @else
                <input type="email" class="form-control" id="email" cname="email" value="{{ $email }}" disabled>
                <input type="hidden" name="emailHidden" value="{{ $email }}">
            @endif
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="passwords" name="passwords" placeholder="Input your new password here" value="{{ old('passwords') }}">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm New Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Input your confirm new password here" value="{{ old('confirmPassword') }}">
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
            <button type="submit" class="btn text-white rounded-pill px-5" style="background-color: #00A099">Submit</button>
        </div>
    </form>
</div>
@endsection