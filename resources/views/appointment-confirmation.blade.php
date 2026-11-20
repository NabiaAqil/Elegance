
@extends('layouts.app')

@section('content')

<section class="confirmation-section">
    <div class="confirmation-card">

        <div class="confirmation-icon">
            <i class="fas fa-check"></i>
        </div>

        <h1>Appointment Request Received!</h1>

        <p class="confirmation-message">
            Thank you for choosing Elegance Salon.
            Your appointment request has been submitted successfully.
        </p>

        <div class="booking-reference">
            <span>Booking Reference</span>
            <h3>#{{ $appointment->id }}</h3>
        </div>

        <div class="confirmation-details">

            <div class="detail-item">
                <span>Service</span>
                <strong>{{ $appointment->service->name }}</strong>
            </div>

            <div class="detail-item">
                <span>Expert</span>
                <strong>{{ $appointment->staff->name }}</strong>
            </div>

            <div class="detail-item">
                <span>Date</span>
                <strong>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}</strong>
            </div>

            <div class="detail-item">
                <span>Time</span>
                <strong>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</strong>
            </div>

            <div class="detail-item">
                <span>Status</span>
                <strong class="pending-status">
                    {{ ucfirst($appointment->status) }}
                </strong>
            </div>

        </div>

        <p class="confirmation-note">
            Your booking is currently pending. Our team will contact you
            regarding confirmation.
        </p>

        <div class="confirmation-actions">
            <a href="{{ route('home') }}" class="home-btn">
                Back to Home
            </a>
        </div>

    </div>
</section>

@endsection


