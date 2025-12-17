@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #051922;
            font-family: 'Segoe UI', sans-serif;
            color: #fff;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            padding: 80px 60px;
            width: 100%;
            max-width: 700px;
            color: #051922;
        }

        .register-card h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: #f28123;
        }

        .form-label {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .form-control {
            font-size: 1.3rem;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #ccc;
        }

        .btn-register {
            width: 100%;
            padding: 16px;
            font-size: 1.4rem;
            border-radius: 12px;
            font-weight: bold;
            background: #f28123;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }


    </style>

    <div class="register-wrapper">
        <div class="register-card">
            <h2>Register New Account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-register">Register</button>
            </form>
        </div>
    </div>
@endsection
