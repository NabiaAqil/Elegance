
@extends('admin.layouts.app')

@section('title', 'Add Inventory Item - Elegance Salon')
@section('page-heading', 'Add Inventory Item')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Add New Inventory Item</h2>
            <p>Add a new product to salon inventory.</p>
        </div>

        <a href="{{ route('admin.inventory.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Inventory
        </a>
    </div>

    <div class="staff-edit-container">

        <div class="staff-edit-heading">
            <h3>Product Information</h3>
            <p>Enter the details of the inventory product.</p>
        </div>

        <div class="staff-edit-card">

            <form action="{{ route('admin.inventory.store') }}" method="POST">
                @csrf

                <div class="staff-form-grid">

                    <div class="form-group">
                        <label>Product Name *</label>
                        <input type="text" name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter product name" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand"
                               value="{{ old('brand') }}"
                               placeholder="Enter brand name">
                        @error('brand')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Supplier Dropdown -->
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier_id">
                            <option value="">Select Supplier (Optional)</option>

                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('supplier_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        @if($suppliers->isEmpty())
                            <small>No suppliers available. Add a supplier first.</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Available Quantity *</label>
                        <input type="number" name="quantity"
                               value="{{ old('quantity', 0) }}"
                               min="0" required>
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Low Stock Alert *</label>
                        <input type="number" name="low_stock_alert"
                               value="{{ old('low_stock_alert', 5) }}"
                               min="0" required>
                        <small>Alert when stock reaches this quantity.</small>
                        @error('low_stock_alert')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="price"
                               value="{{ old('price') }}"
                               placeholder="Enter price"
                               min="0" step="0.01">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="staff-form-actions">
                    <a href="{{ route('admin.inventory.index') }}" class="staff-cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="staff-save-btn">
                        <i class="fas fa-save"></i> Save Item
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
