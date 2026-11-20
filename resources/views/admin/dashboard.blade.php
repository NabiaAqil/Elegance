
@extends('admin.layouts.app')

@section('title', 'Admin Dashboard - Elegance')

@section('page-heading', 'Dashboard')

@section('content')

<div class="admin-welcome">
    <h2>Welcome Back, {{ Auth::user()->name }}!</h2>
    <p>Here's what's happening at your salon today.</p>
</div>

<!-- STATISTICS CARDS -->

<div class="admin-stats-grid">

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <h4>Total Staff</h4>
            <h2>{{ $totalStaff }}</h2>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-friends"></i>
        </div>
        <div>
            <h4>Total Customers</h4>
            <h2>{{ $totalCustomers }}</h2>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div>
            <h4>Total Appointments</h4>
            <h2>{{ $totalAppointments }}</h2>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-money-bill-wave"></i>
        </div>
        <div>
            <h4>Total Revenue</h4>
            <h2>Rs. {{ number_format($totalRevenue, 0) }}</h2>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div>
            <h4>Pending Appointments</h4>
            <h2>{{ $pendingAppointments }}</h2>
        </div>
    </div>

    <div class="admin-stat-card">
        <div class="stat-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div>
            <h4>Low Stock Products</h4>
            <h2>{{ $lowStockItems }}</h2>
        </div>
    </div>

</div>


<!-- RECENT APPOINTMENTS -->

<div class="admin-panel">

    <div class="admin-panel-header">
        <h3>Recent Appointments</h3>
    </div>

    <div class="admin-table-wrapper">

        <table class="admin-table">

            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Staff</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($recentAppointments as $appointment)

                    <tr>
                        <td>
                            {{ $appointment->customer->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->service->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->staff->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                        </td>

                        <td>
                            @php
                                $statusClass = match($appointment->status) {
                                    'completed' => 'badge-success',
                                    'pending' => 'badge-warning',
                                    'cancelled', 'rejected' => 'badge-danger',
                                    default => 'badge-warning',
                                };
                            @endphp

                            <span class="admin-badge {{ $statusClass }}">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" style="text-align:center;">
                            No appointments available yet.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
