@extends('layouts.guest')

@section('content')
<section class="auth-bg-section">
    <div class="auth-glass-card">
        
        <div class="auth-header">
            <h2>Welcome Back</h2>
            <p>Login to your Elegance account</p>
        </div>

        <!-- Errors / Status -->
        @if (session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                @error('password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
              
            <!-- Role Selection (Customer or Staff) -->
<div class="form-group">
    <label>Login As</label>
    <div class="role-selector">
        <label>
            <input type="radio" name="role" value="customer" checked>
            <span>Customer</span>
        </label>
        <label>
            <input type="radio" name="role" value="staff">
            <span>Staff</span>
        </label>
    </div>
</div>


      <div class="form-actions">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn-auth-submit">Log in</button>

            <div class="auth-footer">
                <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
            </div>
        </form>
    </div>
</section>
@endsection