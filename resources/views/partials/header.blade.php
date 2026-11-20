<header class="site-header transparent-header">
    <div class="container header-container">
        
        <!-- 1. LOGO -->
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Elegance Logo" style="max-height: 90px; width: auto;">
            </a>
        </div>

        <!-- 2. NAVIGATION LINKS -->
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/') }}" class="btn-primary-pink">Home</a></li>
                
                <!-- Services Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="btn-primary-pink">Services <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px;"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('services.facial') }}">Facial</a></li>
                        <li><a href="{{ route('services.makeup') }}">Makeup</a></li>
                        <li><a href="{{ route('services.bridal') }}">Bridal Makeup</a></li>
                        <li><a href="{{ route('services.hair') }}">Hair Styling</a></li>
                        <li><a href="{{ route('services.manicure-pedicure') }}">Manicure & Pedicure</a></li>
                        <li><a href="{{ route('services.spa') }}">Spa</a></li>
                    </ul>
                </li>
                
                <li><a href="{{ route('our-staff') }}" class="btn-primary-pink">Staff</a></li>
                <li><a href="{{ route('contact') }}" class="btn-primary-pink">Contact</a></li>
            </ul>
        </nav>

        <!-- 3. RIGHT SIDE (LOGIN / PROFILE DROPDOWN) -->
        <div class="header-actions">
            @guest
                <a href="{{ route('login') }}" class="btn-primary-pink" style="text-decoration: none;">
                    <i class="fas fa-user"></i> Login
                </a>
            @endguest

            @auth
                <!-- User Profile Dropdown -->
                <div class="user-profile-dropdown">
                    <button class="profile-btn">
                        <i class="fas fa-user-circle"></i>
                    </button>
                    <div class="profile-dropdown-menu">
                        <div class="user-info-header">
                            <p>{{ Auth::user()->name }}</p>
                            <span>{{ ucfirst(Auth::user()->role) }}</span>
                        </div>
                        
                        @if(Auth::user()->role === 'staff')
                            <a href="{{ route('staff.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Staff Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> My Dashboard</a>
                        @endif

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