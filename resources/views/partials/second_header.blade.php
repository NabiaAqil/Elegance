<!-- Top Bar (Gold/Champagne) -->
<div class="top-bar">
    <div class="container top-bar-container">
        <div class="top-contact">
            <span><i class="fas fa-phone"></i> +91 98765 43210</span>
            <span><i class="fas fa-envelope"></i> hello@elegance.com</span>
        </div>
        <div class="top-social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
</div>

<!-- Main Inner Header (White) -->
<header class="site-header inner-header">
    <div class="container header-container">
        
        <!-- LOGO -->
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Elegance Logo" style="max-height: 60px; width: auto;">
            </a>
        </div>

        <!-- NAVIGATION -->
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="dropdown">
                    <a href="#">Services <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px;"></i></a>
                     <ul class="dropdown-menu">
                        <li><a href="{{ route('services.facial') }}">Facial</a></li>
                        <li><a href="{{ route('services.makeup') }}">Makeup</a></li>
                        <li><a href="{{ route('services.bridal') }}">Bridal Makeup</a></li>
                        <li><a href="{{ route('services.hair') }}">Hair Styling</a></li>
                        <li><a href="{{ route('services.manicure-pedicure') }}">Manicure & Pedicure</a></li>
                        <li><a href="{{ route('services.spa') }}">Spa</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('our-staff') }}">Staff</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <!-- RIGHT SIDE ACTIONS -->
        <div class="header-actions">
            
            <!-- 1. BOOK APPOINTMENT (Sirf Customer ke liye, Staff ke liye nahi) -->
            @auth
                @if(Auth::user()->role !== 'staff')
                    <a href="{{ url('/book-appointment') }}#appointment"  class="btn-header-book">Book Appointment</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn-header-book">Book Appointment</a>
            @endauth

            <!-- 2. LOGIN / PROFILE DROPDOWN -->
            @guest
                <a href="{{ route('login') }}" class="auth-btn-dark">
                    <i class="fas fa-user"></i> Login
                </a>
            @endguest

            @auth
                <!-- User Profile Dropdown (Insan ka Icon) -->
                <div class="user-profile-dropdown">
                    <button class="profile-btn">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div class="profile-dropdown-menu">
                        <div class="user-info-header">
                            <p>{{ Auth::user()->name }}</p>
                            <span>{{ ucfirst(Auth::user()->role) }}</span>
                        </div>
                        
                        <!-- Dashboard Link (Staff ke liye alag, Customer ke liye alag) -->
                        @if(Auth::user()->role === 'staff')
                            <a href="{{ route('staff.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Staff Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> My Dashboard</a>
                        @endif

                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>

    </div>
</header>