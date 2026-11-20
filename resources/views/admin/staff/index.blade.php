
@extends('admin.layouts.app')

@section('title', 'Staff Management - Elegance')
@section('page-heading', 'Staff Management')

@section('content')

<div class="staff-management">

    {{-- Page Header --}}
    <div class="staff-page-header">
        <div>
            <h2>Our Staff Members</h2>
            <p>Manage your salon's professional team.</p>
        </div>

        <a href="{{ route('admin.staff.create') }}" class="btn-primary-pink">
            <i class="fas fa-plus"></i>
            Add New Staff
        </a>
    </div>

    {{-- Staff Statistics --}}
    <div class="staff-summary">
        <div class="staff-summary-card">
            <div class="summary-icon">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <span>Total Staff</span>
                <h3>{{ $staffMembers->count() }}</h3>
            </div>
        </div>
    </div>

    {{-- Staff Table --}}
    <div class="staff-table-card">

        <div class="staff-table-heading">
            <h3>Staff Directory</h3>
            <span>{{ $staffMembers->count() }} Members</span>
        </div>

        <div class="staff-table-wrapper">

            <table class="staff-table">

                <thead>
                    <tr>
                        <th>Staff Member</th>
                        <th>Specialization</th>
                        <th>Experience</th>
                        <th>Rating</th>
                        <th>Commission</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($staffMembers as $staff)

                        <tr>

                            {{-- Staff Information --}}
                            <td>
                                <div class="staff-info">

                                    <img
                                        src="{{ $staff->staffProfile?->profile_image
                                            ? asset('images/staff/' . $staff->staffProfile->profile_image)
                                            : asset('images/default-user.png') }}"
                                        alt="{{ $staff->name }}"
                                        class="staff-avatar"
                                    >

                                    <div class="staff-details">
                                        <strong>{{ $staff->name }}</strong>
                                        <span>{{ $staff->email }}</span>
                                    </div>

                                </div>
                            </td>

                            {{-- Specialization --}}
                            <td>
                                <span class="staff-specialization">
                                    {{ $staff->staffProfile?->specialization ?? 'Not Assigned' }}
                                </span>
                            </td>

                            {{-- Experience --}}
                            <td>
                                {{ $staff->staffProfile?->experience_years ?? 0 }} Years
                            </td>

                            {{-- Rating --}}
                            <td>
                                <span class="staff-rating">
                                    <i class="fas fa-star"></i>
                                    {{ number_format($staff->staffProfile?->rating ?? 0, 1) }}
                                </span>
                            </td>

                            {{-- Commission --}}
                            <td>
                                {{ number_format($staff->staffProfile?->commission_rate ?? 10, 2) }}%
                            </td>

                            {{-- Actions --}}
                            <td>
                                <div class="staff-actions">

                                    <a href="{{ route('admin.staff.edit', $staff->id) }}"
                                       class="staff-action-btn edit-btn"
                                       title="Edit Staff">
                                        <i class="fas fa-pen"></i>
                                    </a>

<form action="{{ route('admin.staff.destroy', $staff->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this staff member?');">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="staff-action-btn delete-btn"
            title="Delete Staff">
        <i class="fas fa-trash"></i>
    </button>

</form>


                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty-staff">
                                <i class="fas fa-users"></i>
                                <p>No staff members found.</p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
