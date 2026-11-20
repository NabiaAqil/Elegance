
@extends('admin.layouts.app')

@section('content')

<div class="staff-management">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="staff-page-header">
        <div>
            <h2>Appointment Management</h2>
            <p>Manage all salon appointments and bookings.</p>
        </div>

        <div class="staff-summary">
            <div class="staff-summary-card">
                <span>Total Appointments</span>
                <h3>{{ $appointments->count() }}</h3>
            </div>
        </div>
    </div>
{{-- Appointment Filters --}}
<div class="appointment-filter-card">

    <form action="{{ route('admin.appointments.index') }}" method="GET">

        <div class="appointment-filter-grid">

            <div class="appointment-filter-group">
                <label>Search Customer</label>
                <input
                    type="text"
                    name="search"
                    placeholder="Enter customer name..."
                    value="{{ request('search') }}"
                >
            </div>

            <div class="appointment-filter-group">
                <label>Appointment Status</label>
                <select name="status">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="appointment-filter-group">
                <label>Appointment Date</label>
                <input
                    type="date"
                    name="date"
                    value="{{ request('date') }}"
                >
            </div>

            <div class="appointment-filter-actions">
                <button type="submit" class="appointment-filter-btn">
                    <i class="fas fa-filter"></i> Apply Filters
                </button>

                <a href="{{ route('admin.appointments.index') }}" class="appointment-reset-btn">
                    <i class="fas fa-redo"></i> Reset
                </a>
            </div>

        </div>

    </form>

</div>
    <div class="staff-table-card">

        <div class="staff-table-heading">
            <h3>All Appointments</h3>
        </div>

        <div class="table-responsive">
            <table class="staff-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Staff</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($appointments as $appointment)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $appointment->customer?->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->service?->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->staff?->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->appointment_date
                                ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y')
                                : 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->appointment_time
                                ? \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A')
                                : 'N/A' }}
                        </td>

                       <td>
    <span class="customer-appointment-status {{ strtolower($appointment->status) }}">
        {{ ucfirst($appointment->status) }}
    </span>

    @if($appointment->status === 'pending')

        <div class="appointment-action-buttons">

            <form action="{{ route('admin.appointments.updateStatus', $appointment->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="confirmed">

                <button type="submit" class="appointment-confirm-btn">
                    <i class="fas fa-check"></i> Confirm
                </button>
            </form>

            <form action="{{ route('admin.appointments.updateStatus', $appointment->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="status" value="cancelled">

                <button type="submit"
                        class="appointment-cancel-btn"
                        onclick="return confirm('Are you sure you want to cancel this appointment?')">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </form>

        </div>

    @endif
</td>
<td>
    <a href="{{ route('admin.appointments.show', $appointment->id) }}"
       class="staff-action-btn edit-btn">
        <i class="fas fa-eye"></i> View
    </a>
</td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="8" class="text-center">
                            No appointments found.
                        </td>
                    </tr>

                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
