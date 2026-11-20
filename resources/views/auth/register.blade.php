@extends('layouts.guest')

@section('content')
<section class="auth-bg-section">
    <div class="auth-glass-card">
        
        <div class="auth-header">
            <h2>Create Account</h2>
            <p>Join Elegance Beauty Parlour</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-auth-submit">Register</button>

            <div class="auth-footer">
                <p>Already registered? <a href="{{ route('login') }}">Login Here</a></p>
            </div>
        </form>
    </div>
</section>
@endsection