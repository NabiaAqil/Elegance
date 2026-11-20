@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="page-header" style="background-image: url('{{ asset('images/service_banner.png') }}');">
    <div class="container text-center">
        <h1>{{ $service->name }}</h1>
        <p>Premium Spa Therapy by Elegance</p>
    </div>
</section>

<!-- Detail Section -->
<section class="service-detail-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="/">Home</a> / <a href="{{ route('services.spa') }}">Spa & Relaxation</a> / <span>{{ $service->name }}</span>
        </div>
        <div class="detail-grid">
            <div class="detail-image">
                <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->name }}">
            </div>
            <div class="detail-content">
                <h2>{{ $service->name }}</h2>
                <p class="price-tag">Starting from <strong>Rs. {{ $service->price }}</strong></p>
                <p class="duration-tag"><i class="fas fa-clock"></i> Duration: {{ $service->duration }} minutes</p>
                <p class="desc">{{ $service->short_description }}</p>
                <div class="brand-box">
                    <h4><i class="fas fa-certificate"></i> Premium Products We Use</h4>
                    <p>{{ $service->brands_used }}</p>
                </div>
                <a href="{{ route('services.spa') }}#appointment" class="btn-primary-pink" style="margin-top: 20px;">Book This Treatment</a>
            </div>
        </div>
    </div>
</section>

<!-- Related Services -->
@if($relatedServices->count() > 0)
<section class="related-services-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>You May Also Like</h2>
        </div>
        <div class="services-page-grid">
            @foreach($relatedServices as $related)
                <div class="service-page-card">
                    <div class="service-page-img">
                        <img src="{{ asset('images/' . $related->image) }}" alt="{{ $related->name }}">
                    </div>
                    <div class="service-page-content">
                        <h3>{{ $related->name }}</h3>
                        <div class="service-meta">
                            <span class="price">Rs. {{ $related->price }}</span>
                        </div>
                        <a href="{{ route('services.spa.detail', $related->slug) }}" class="btn-view-detail">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection