
@extends('layouts.app')

@section('content')
<section class="dashboard-section">
    <div class="container">

        <div class="dashboard-header">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p>Manage your appointments and profile here.</p>
                </div>
            </div>

            
        </div>

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

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="appointments-wrapper">
            <h3 class="section-heading">Your Appointments</h3>

            @if($appointments->count() > 0)

                <div class="appointments-table-wrapper">
                    <table class="appointments-table">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Staff</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Review</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->service->name ?? 'N/A' }}</td>

                                    <td>{{ $appointment->staff->name ?? 'Any Available' }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M, Y') }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                    </td>

                                    <td>
                                        <span class="status-badge">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($appointment->status === 'completed')

                                            @if($appointment->review)
                                                <span class="status-badge status-completed">
                                                    Reviewed
                                                </span>
                                            @else
                                                <form action="{{ route('reviews.store', $appointment->id) }}"
                                                      method="POST">
                                                    @csrf

                                                    <div class="review-form">
                                                        <label>Rating</label>

                                                        <select name="rating" required>
                                                            <option value="">Select Stars</option>
                                                            <option value="5">5 - Excellent</option>
                                                            <option value="4">4 - Very Good</option>
                                                            <option value="3">3 - Good</option>
                                                            <option value="2">2 - Fair</option>
                                                            <option value="1">1 - Poor</option>
                                                        </select>

                                                        <label>Feedback</label>

                                                        <textarea
                                                            name="comment"
                                                            rows="2"
                                                            maxlength="1000"
                                                            placeholder="Share your experience..."
                                                        ></textarea>

                                                        <button type="submit"
                                                                class="btn-primary-pink">
                                                            Submit Review
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif

                                        @else
                                            <span>Not Available</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <div class="no-appointments">
                    <i class="fas fa-calendar-times"></i>
                    <h4>No Appointments Yet</h4>
                    <p>You haven't booked any appointment yet. Explore our services and book one now!</p>
                    <a href="{{ url('/') }}" class="btn-primary-pink">
                        Explore Services
                    </a>
                </div>
            @endif
        </div>

    </div>
</section>
@endsection
