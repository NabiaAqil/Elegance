@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Add New Inventory Item</h2>
                <p class="text-muted">
                    Add a new product to your salon inventory.
                </p>
            </div>

            <a href="{{ route('inventory.items.index') }}"
               class="btn-outline-dark">
                Back to Inventory
            </a>
        </div>


        {{-- INVENTORY FORM --}}
        <div class="inventory-form-wrapper">

            <form action="{{ route('inventory.items.store') }}"
                  method="POST">

                @csrf

                <div class="inventory-form-grid">

                    {{-- Product Name --}}
                    <div class="form-group">
                        <label for="name">Product Name *</label>

                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Facial Kit"
                               required>

                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Brand --}}
                    <div class="form-group">
                        <label for="brand">Brand Name</label>

                        <input type="text"
                               id="brand"
                               name="brand"
                               value="{{ old('brand') }}"
                               placeholder="e.g. O3+, L'Oreal">

                        @error('brand')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Quantity --}}
                    <div class="form-group">
                        <label for="quantity">Available Quantity *</label>

                        <input type="number"
                               id="quantity"
                               name="quantity"
                               value="{{ old('quantity', 0) }}"
                               min="0"
                               placeholder="Enter available quantity"
                               required>

                        @error('quantity')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Low Stock Alert --}}
                    <div class="form-group">
                        <label for="low_stock_alert">Low Stock Alert Limit *</label>

                        <input type="number"
                               id="low_stock_alert"
                               name="low_stock_alert"
                               value="{{ old('low_stock_alert', 5) }}"
                               min="0"
                               placeholder="e.g. 5"
                               required>

                        @error('low_stock_alert')
                            <span class="error-message">{{ $message }}</span>
                        @enderror

                        <small>
                            Alert will show when quantity reaches this limit.
                        </small>
                    </div>


                    {{-- Price --}}
                    <div class="form-group">
                        <label for="price">Product Price (Rs.)</label>

                        <input type="number"
                               id="price"
                               name="price"
                               value="{{ old('price') }}"
                               min="0"
                               step="0.01"
                               placeholder="e.g. 2500.00">

                        @error('price')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                {{-- FORM BUTTONS --}}
                <div class="inventory-form-buttons">

                    <a href="{{ route('inventory.items.index') }}"
                       class="btn-outline-dark">
                        Cancel
                    </a>

                    <button type="submit" class="btn-primary-pink">
                        Save Inventory Item
                    </button>

                </div>

            </form>

        </div>

    </div>
</section>




@endsection
