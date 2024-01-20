@extends('layouts.template')
@section('title', 'INLA Tools')

@section('content')
<div class="container-lg d-flex justify-content-center align-items-center gap-5">
    <div class="flex-column d-lg-flex text-center">
        <div class="fw-bold fs-4">Integrated Nested Laplace Approximations Tools</div>
        <div class="fw-bold" style="color: #BBCF33">For Disconnected Area - East Nusa Tenggara Province</div>
        <div class="pt-4">
            <a class="btn text-white fw-bold rounded-pill px-5" style="background-color: #00A099" href="{{ route('login') }}" role="button">Login</a>
            <a class="btn fw-bold rounded-pill px-5" style="color: #00A099; border: 2px solid #00A099;" href="{{ route('register') }}" role="button">Register</a>
        </div>
    </div>
    <div>
        <img src="{{ asset('storage/images/INLA_IMAGE.png') }}" alt="" height="250vh">
    </div>
</div>
@endsection

<!-- EXTRA CSS -->
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>