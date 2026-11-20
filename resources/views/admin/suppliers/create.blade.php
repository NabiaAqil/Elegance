
@extends('admin.layouts.app')

@section('title', 'Add Supplier - Elegance Salon')
@section('page-heading', 'Add Supplier')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Add New Supplier</h2>
            <p>Register a new salon product supplier.</p>
        </div>

        <a href="{{ route('admin.suppliers.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Suppliers
        </a>
    </div>

    <div class="staff-edit-container">

        <div class="staff-edit-heading">
            <h3>Supplier Information</h3>
            <p>Enter supplier contact and business details.</p>
        </div>

        <div class="staff-edit-card">

            <form action="{{ route('admin.suppliers.store') }}" method="POST">
                @csrf

                <div class="staff-form-grid">

                    <div class="form-group">
                        <label>Supplier Name *</label>
                        <input type="text" name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter supplier name" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" name="contact_person"
                               value="{{ old('contact_person') }}"
                               placeholder="Enter contact person">
                        @error('contact_person')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="Enter phone number">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter email address">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="3"
                                  placeholder="Enter supplier address">{{ old('address') }}</textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="staff-form-actions">

                    <a href="{{ route('admin.suppliers.index') }}"
                       class="staff-cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="staff-save-btn">
                        <i class="fas fa-save"></i> Save Supplier
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
