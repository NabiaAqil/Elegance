
@extends('admin.layouts.app')

@section('title', 'Edit Supplier - Elegance Salon')
@section('page-heading', 'Edit Supplier')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Edit Supplier</h2>
            <p>Update supplier contact and business details.</p>
        </div>

        <a href="{{ route('admin.suppliers.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Suppliers
        </a>
    </div>

    <div class="staff-edit-container">

        <div class="staff-edit-heading">
            <h3>Update Supplier Information</h3>
            <p>Make changes to the selected supplier details.</p>
        </div>

        <div class="staff-edit-card">

            <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="staff-form-grid">

                    <div class="form-group">
                        <label>Supplier Name *</label>
                        <input type="text" name="name"
                               value="{{ old('name', $supplier->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" name="contact_person"
                               value="{{ old('contact_person', $supplier->contact_person) }}">
                        @error('contact_person')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone"
                               value="{{ old('phone', $supplier->phone) }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email"
                               value="{{ old('email', $supplier->email) }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="3">{{ old('address', $supplier->address) }}</textarea>
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
                        <i class="fas fa-save"></i> Update Supplier
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection

