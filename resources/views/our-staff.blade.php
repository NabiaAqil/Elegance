@extends('layouts.app')

@section('content')
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>Our Experts</h1>
        <p>Meet the talented team behind Elegance Beauty Parlour.</p>
    </div>
</section>

<section class="experts-section" style="padding: 80px 0;">
    <div class="container">
        <div class="experts-grid">
            @foreach($allStaff as $staff)
                <div class="expert-card">
                    <div class="expert-img">
                        @if($staff->profile_image)
                            <img src="{{ asset('images/staff/' . $staff->profile_image) }}" alt="{{ $staff->user->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $staff->user->name }}&background=F8BBD0&color=590019&size=300" alt="{{ $staff->user->name }}">
                        @endif
                    </div>
                    <div class="expert-content">
                        <h3>{{ $staff->user->name }}</h3>
                        <p class="specialty">{{ $staff->specialization }}</p>
                        <div class="rating">
    @php
        $rating = $staff->rating ?? 0; 
        $fullStars = floor($rating); 
        $halfStar = ($rating - $fullStars) >= 0.5; 
    @endphp

    {{-- Poore Stars --}}
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $fullStars)
            <i class="fas fa-star" style="color: var(--champagne-gold);"></i>
        @elseif ($i == $fullStars + 1 && $halfStar)
            <i class="fas fa-star-half-alt" style="color: var(--champagne-gold);"></i>
        @else
            <i class="far fa-star" style="color: #ccc;"></i> 
        @endif
    @endfor

    <span>({{ $staff->experience_years }} Yrs Exp)</span>
</div>
                        <p style="font-size: 13px; color: #666; margin-bottom: 15px;">{{ $staff->bio }}</p>
                        <!-- Book with Button (apne page ke route ke hisab se badlein) -->
                        <a href="{{ url('/#appointment') }}" class="btn-book-expert">Book Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection