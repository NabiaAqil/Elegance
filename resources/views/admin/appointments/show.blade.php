
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <div>
            <h2>Appointment Details</h2>
            <p>Complete information about this booking.</p>
        </div>

        <a href="{{ route('admin.appointments.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Appointments
        </a>
    </div>

    <div class="staff-edit-card">

        <div class="customer-details-grid">

            <div class="customer-detail-item">
                <span>Appointment ID</span>
                <strong>#{{ $appointment->id }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Customer Name</span>
                <strong>{{ $appointment->customer?->name ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Customer Email</span>
                <strong>{{ $appointment->customer?->email ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Staff Member</span>
                <strong>{{ $appointment->staff?->name ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Staff Email</span>
                <strong>{{ $appointment->staff?->email ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Service</span>
                <strong>{{ $appointment->service?->name ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Service Price</span>
                <strong>
                    {{ $appointment->service?->price !== null
                        ? 'Rs. ' . number_format($appointment->service->price, 2)
                        : 'N/A' }}
                </strong>
            </div>

            <div class="customer-detail-item">
                <span>Appointment Date</span>
                <strong>{{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') : 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Appointment Time</span>
                <strong>{{ $appointment->appointment_time ? \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') : 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Status</span>
                <strong>{{ ucfirst($appointment->status) }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Customer Notes</span>
                <strong>{{ $appointment->notes ?: 'No notes provided.' }}</strong>
            </div>

        </div>

    </div>

</div>

@endsection
