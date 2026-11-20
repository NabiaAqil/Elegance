@extends('layouts.app')

@section('content')
<section class="dashboard-section">
    <div class="container">
        
        <!-- Welcome Header -->
        <div class="dashboard-header">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p>Manage your schedule and appointments here.</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('staff.profile.edit') }}" class="btn-primary-pink">Edit Profile</a>
                <a href="{{ route('staff.inventory') }}" class="btn-primary-pink">
    View Inventory
</a>
            
            </div>
        </div>
        <!-- Total Commission Card -->
        <div class="commission-card">
            <div class="commission-info">
                <h3><i class="fas fa-wallet"></i> Total Commission Earned</h3>
                <p>Based on your completed appointments</p>
            </div>
            <div class="commission-amount">
                Rs. {{ number_format($totalCommission, 2) }}
            </div>
        </div>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="staff-dashboard-grid">
            <!-- Left Side: Aane Wali Appointments -->
            <div class="appointments-wrapper">
                <h3 class="section-heading">Upcoming Appointments</h3>

                @if($appointments->count() > 0)
                    <div class="appointments-table-wrapper">
                        <table class="appointments-table">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Contact Info</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <!-- Client Name -->
                                        <td>{{ $appointment->customer->name ?? 'N/A' }}</td>
                                        
                                        <!-- Contact Info (Phone & Email) -->
                                        <td>
                                            <div style="font-size: 13px; color: #555;">
                                                <i class="fas fa-phone" style="color: var(--dark-pink);"></i> {{ $appointment->customer->phone ?? 'No Phone' }} <br>
                                                <i class="fas fa-envelope" style="color: var(--dark-pink);"></i> {{ $appointment->customer->email ?? 'No Email' }}
                                            </div>
                                        </td>
                                        
                                        <!-- Service Name -->
                                        <td>{{ $appointment->service->name ?? 'N/A' }}</td>
                                        
                                        <!-- Date -->
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}</td>
                                        
                                        <!-- Time -->
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</td>
                                        
                                        <!-- Status Update Dropdown -->
                                        <td>
                                            <form action="{{ route('staff.appointment.status', $appointment->id) }}" method="POST">
                                                @csrf
                                                <select name="status" class="status-select" onchange="this.form.submit()">
                                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="no-appointments">
                        <i class="fas fa-calendar-check"></i>
                        <h4>No Upcoming Appointments</h4>
                        <p>You don't have any appointments scheduled yet.</p>
                    </div>
                @endif
            </div>

            <!-- Right Side: Unavailable Dates Form & List -->
            <div class="unavailable-wrapper">
                <h3 class="section-heading">Mark Unavailability</h3>
                
                <form action="{{ route('staff.unavailable.store') }}" method="POST" class="unavailable-form">
                    @csrf
                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="date" name="unavailable_date" required>
                    </div>
                    <div class="form-group">
                        <label>Reason (Optional)</label>
                        <input type="text" name="reason" placeholder="e.g. Leave, Sick">
                    </div>
                    <button type="submit" class="btn-primary-pink" style="width: 100%; border: none; cursor: pointer;">Mark as Unavailable</button>
                </form>

                <h4 class="mt-4">Your Unavailable Dates</h4>
                <ul class="unavailable-list">
                    @forelse($unavailableDates as $date)
                        <li>
                            <i class="fas fa-calendar-times"></i>
                            {{ \Carbon\Carbon::parse($date->unavailable_date)->format('d M, Y') }}
                            @if($date->reason) 
                                <span>({{ $date->reason }})</span> 
                            @endif
                        </li>
                    @empty
                        <p class="text-muted">No dates marked yet.</p>
                    @endforelse
                </ul>
            </div>
        </div>

    </div>
</section>
@endsection