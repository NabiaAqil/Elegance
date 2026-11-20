
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <div>
            <h2>Service Details</h2>
            <p>Complete information about this salon service.</p>
        </div>

        <a href="{{ route('admin.services.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Services
        </a>
    </div>

    <div class="staff-edit-card">

        <div class="customer-details-grid">

            <div class="customer-detail-item">
                <span>Service Image</span>
                @if($service->image)
                    <img src="{{ asset('images/' . $service->image) }}"
                         alt="{{ $service->name }}"
                         width="150"
                         style="border-radius: 10px; object-fit: cover;">
                @else
                    <strong>No image available</strong>
                @endif
            </div>

            <div class="customer-detail-item">
                <span>Service Name</span>
                <strong>{{ $service->name }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Category</span>
                <strong>{{ $service->category?->name ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Slug</span>
                <strong>{{ $service->slug }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Price</span>
                <strong>Rs. {{ number_format($service->price, 2) }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Duration</span>
                <strong>{{ $service->duration }} minutes</strong>
            </div>

            <div class="customer-detail-item">
                <span>Brands Used</span>
                <strong>{{ $service->brands_used ?: 'Not specified' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Short Description</span>
                <strong>{{ $service->short_description ?: 'No description available.' }}</strong>
            </div>

        </div>

    </div>

</div>

@endsection
