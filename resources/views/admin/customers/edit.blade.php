
@extends('admin.layouts.app')

@section('content')

<div class="staff-edit-container">

    <div class="staff-edit-heading">
        <div>
            <h2>Edit Customer</h2>
            <p>Update customer account information.</p>
        </div>

        <a href="{{ route('admin.customers.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Customers
        </a>
    </div>

    <div class="staff-edit-card">

        <form action="{{ route('admin.customers.update', $customer->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="staff-form-grid">

                <div class="form-group">
                    <label>Customer Name *</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name', $customer->name) }}"
                           required>

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email Address *</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email', $customer->email) }}"
                           required>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="staff-form-actions">

                <a href="{{ route('admin.customers.index') }}"
                   class="staff-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="staff-save-btn">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
