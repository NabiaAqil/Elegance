
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <!-- Page Header -->
    <div class="staff-edit-heading">
        <div>
            <h2>Customer Details</h2>
            <p>View customer information and appointment history.</p>
        </div>

        <a href="{{ route('admin.customers.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Customers
        </a>
    </div>

    <!-- Customer Information -->
    <div class="staff-edit-card">

        <div class="customer-profile-header">

            <div class="customer-profile-avatar">
                <i class="fas fa-user"></i>
            </div>

            <div>
                <h3>{{ $customer->name }}</h3>
                <p>{{ $customer->email }}</p>
                <span class="customer-status">Registered Customer</span>
            </div>

        </div>

        <div class="customer-details-grid">

            <div class="customer-detail-item">
                <span>Customer Name</span>
                <strong>{{ $customer->name }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Email Address</span>
                <strong>{{ $customer->email }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Account ID</span>
                <strong>#{{ $customer->id }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Registered On</span>
                <strong>{{ $customer->created_at?->format('d M Y') ?? 'N/A' }}</strong>
            </div>

        </div>

    </div>

    <!-- Appointment History -->
    <div class="staff-table-card customer-appointments-card">

        <div class="staff-table-heading">
            <h3>Appointment History</h3>
            <span>{{ $appointments->count() }} Appointments</span>
        </div>

        <div class="table-responsive">

            <table class="staff-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Staff Member</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($appointments as $appointment)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $appointment->service->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $appointment->staff->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $appointment->appointment_date
                                    ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y')
                                    : 'N/A' }}
                            </td>

                            <td>
                                {{ $appointment->appointment_time ?? 'N/A' }}
                            </td>

                            <td>
                                <span class="customer-appointment-status status-{{ strtolower($appointment->status) }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                This customer has no appointments yet.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
