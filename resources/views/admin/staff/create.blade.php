
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <div>
            <h2>Add New Staff Member</h2>
            <p>Create a new staff account and profile.</p>
        </div>

        <a href="{{ route('admin.staff.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Staff
        </a>
    </div>

    <div class="staff-edit-card">

        <form action="{{ route('admin.staff.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="staff-form-grid">

                <div class="form-group">
                    <label>Full Name *</label>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           placeholder="Enter staff name" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Email Address *</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter email address" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password"
                           placeholder="Minimum 8 characters" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password *</label>
                    <input type="password" name="password_confirmation"
                           placeholder="Confirm password" required>
                </div>

                <div class="form-group">
                    <label>Specialization *</label>
                    <select name="specialization" required>
                        <option value="">Select Specialization</option>
                        <option value="Facial & Skin Care" {{ old('specialization') == 'Facial & Skin Care' ? 'selected' : '' }}>Facial & Skin Care</option>
                        <option value="Makeup Services" {{ old('specialization') == 'Makeup Services' ? 'selected' : '' }}>Makeup Services</option>
                        <option value="Bridal Makeup" {{ old('specialization') == 'Bridal Makeup' ? 'selected' : '' }}>Bridal Makeup</option>
                        <option value="Hair Styling & Care" {{ old('specialization') == 'Hair Styling & Care' ? 'selected' : '' }}>Hair Styling & Care</option>
                        <option value="Manicure & Pedicure" {{ old('specialization') == 'Manicure & Pedicure' ? 'selected' : '' }}>Manicure & Pedicure</option>
                        <option value="Spa & Relaxation" {{ old('specialization') == 'Spa & Relaxation' ? 'selected' : '' }}>Spa & Relaxation</option>
                    </select>
                    @error('specialization') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Experience (Years)</label>
                    <input type="number" name="experience_years"
                           value="{{ old('experience_years') }}"
                           min="0" placeholder="Enter experience">
                    @error('experience_years') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Commission Rate (%) *</label>
                    <input type="number" name="commission_rate"
                           value="{{ old('commission_rate', 10) }}"
                           min="0" max="100" step="0.01" required>
                    @error('commission_rate') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Profile Image</label>
                    <input type="file" name="profile_image"
                           accept=".jpg,.jpeg,.png">
                    @error('profile_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group full-width">
                    <label>Short Bio</label>
                    <textarea name="bio" rows="4"
                              placeholder="Write a short introduction...">{{ old('bio') }}</textarea>
                    @error('bio') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

            </div>

            <div class="staff-form-actions">
                <a href="{{ route('admin.staff.index') }}" class="staff-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="staff-save-btn">
                    <i class="fas fa-user-plus"></i>
                    Add Staff Member
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
