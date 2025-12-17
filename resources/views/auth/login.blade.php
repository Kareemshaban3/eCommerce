@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #051922;
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
    }
</style>

<div class="login-wrapper">

    @include('layouts.masterHandling')

    <div class="login-card">
        <h2>Login to Your Account</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                @error('email')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required placeholder="Enter your password">
                @error('password')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="btn btn-login">Login</button>

            @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-muted">
                        Forgot Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
