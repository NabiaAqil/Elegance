
@extends('admin.layouts.app')

@section('title', 'Edit Staff - Elegance')
@section('page-heading', 'Edit Staff')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <h2>Edit Staff Member</h2>
        <p>Update your staff member's personal and professional details.</p>
    </div>
    <a href="{{ route('admin.staff.index') }}" class="staff-back-btn">
        <i class="fas fa-arrow-left"></i>
        Back to Staff List
    </a>

    <div class="staff-edit-card">

        <form action="{{ route('admin.staff.update', $staff->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="staff-form-grid">

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name"
                        value="{{ old('name', $staff->name) }}" required>
                    @error('name') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email"
                        value="{{ old('email', $staff->email) }}" required>
                    @error('email') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Specialization</label>
                    <select name="specialization" required>
                        @foreach([
                            'Facial & Skin Care',
                            'Makeup Services',
                            'Bridal Makeup',
                            'Hair Styling & Care',
                            'Manicure & Pedicure',
                            'Spa & Relaxation'
                        ] as $specialization)

                            <option value="{{ $specialization }}"
                                {{ old('specialization', $staff->staffProfile?->specialization) == $specialization ? 'selected' : '' }}>
                                {{ $specialization }}
                            </option>

                        @endforeach
                    </select>
                    @error('specialization') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Experience (Years)</label>
                    <input type="number" name="experience_years"
                        min="0"
                        value="{{ old('experience_years', $staff->staffProfile?->experience_years) }}">
                    @error('experience_years') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Commission Rate (%)</label>
                    <input type="number" name="commission_rate"
                        min="0" max="100" step="0.01"
                        value="{{ old('commission_rate', $staff->staffProfile?->commission_rate ?? 10) }}"
                        required>
                    @error('commission_rate') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Profile Image</label>

                    @if($staff->staffProfile?->profile_image)
                        <img
                            src="{{ asset('images/staff/' . $staff->staffProfile->profile_image) }}"
                            class="edit-staff-image"
                            alt="Staff profile">
                    @endif

                    <input type="file" name="profile_image" accept="image/*">
                    <small>Leave empty to keep the current image.</small>
                    @error('profile_image') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Professional Bio</label>
                    <textarea name="bio" rows="5">{{ old('bio', $staff->staffProfile?->bio) }}</textarea>
                    @error('bio') <small class="error">{{ $message }}</small> @enderror
                </div>

            </div>

            <div class="staff-form-actions">
                <a href="{{ route('admin.staff.index') }}" class="staff-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="staff-cancel-btn">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
