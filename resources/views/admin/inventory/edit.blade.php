
@extends('admin.layouts.app')

@section('title', 'Edit Inventory Item - Elegance Salon')
@section('page-heading', 'Edit Inventory Item')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Edit Inventory Item</h2>
            <p>Update product information and stock details.</p>
        </div>

        <a href="{{ route('admin.inventory.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Inventory
        </a>
    </div>

    <div class="staff-edit-container">

        <div class="staff-edit-heading">
            <h3>Update Product Information</h3>
            <p>Make changes to the selected inventory item.</p>
        </div>

        <div class="staff-edit-card">

            <form action="{{ route('admin.inventory.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="staff-form-grid">

                    <div class="form-group">
                        <label>Product Name *</label>
                        <input type="text" name="name"
                               value="{{ old('name', $item->name) }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" name="brand"
                               value="{{ old('brand', $item->brand) }}">
                        @error('brand')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Supplier Dropdown -->
                    <div class="form-group">
                        <label>Supplier</label>

                        <select name="supplier_id">
                            <option value="">No Supplier</option>

                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ old('supplier_id', $item->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('supplier_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Available Quantity *</label>
                        <input type="number" name="quantity"
                               value="{{ old('quantity', $item->quantity) }}"
                               min="0" required>
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Low Stock Alert *</label>
                        <input type="number" name="low_stock_alert"
                               value="{{ old('low_stock_alert', $item->low_stock_alert) }}"
                               min="0" required>
                        @error('low_stock_alert')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="price"
                               value="{{ old('price', $item->price) }}"
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
                        <i class="fas fa-save"></i> Update Item
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
