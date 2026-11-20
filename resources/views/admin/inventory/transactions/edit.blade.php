
@extends('admin.layouts.app')

@section('title', 'Edit Stock Transaction - Elegance Salon')
@section('page-heading', 'Edit Stock Transaction')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Edit Inventory Transaction</h2>
            <p>Update product stock transaction details.</p>
        </div>

        <a href="{{ route('admin.inventory.transactions.index') }}"
           class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Transactions
        </a>
    </div>

    <div class="staff-edit-container">

        <div class="staff-edit-heading">
            <h3>Update Transaction Information</h3>
            <p>Modify the selected stock transaction details.</p>
        </div>

        <div class="staff-edit-card">

            <form action="{{ route('admin.inventory.transactions.update', $transaction->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="staff-form-grid">

                    <!-- PRODUCT -->
                    <div class="form-group">
                        <label for="inventory_item_id">Select Product *</label>

                        <select name="inventory_item_id"
                                id="inventory_item_id"
                                class="form-control"
                                required>

                            <option value="">Choose a product</option>

                            @foreach($items as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('inventory_item_id', $transaction->inventory_item_id) == $item->id ? 'selected' : '' }}>

                                    {{ $item->name }}
                                    ({{ $item->brand ?? 'No Brand' }})
                                    - Available: {{ $item->quantity }}

                                </option>
                            @endforeach

                        </select>

                        @error('inventory_item_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- TRANSACTION TYPE -->
                    <div class="form-group">
                        <label for="type">Transaction Type *</label>

                        <select name="type"
                                id="type"
                                class="form-control"
                                required>

                            <option value="in"
                                {{ old('type', $transaction->type) == 'in' ? 'selected' : '' }}>
                                Stock In - Add Products
                            </option>

                            <option value="out"
                                {{ old('type', $transaction->type) == 'out' ? 'selected' : '' }}>
                                Stock Out - Use Products
                            </option>

                        </select>

                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- QUANTITY -->
                    <div class="form-group">
                        <label for="quantity">Quantity *</label>

                        <input type="number"
                               name="quantity"
                               id="quantity"
                               class="form-control"
                               min="1"
                               value="{{ old('quantity', $transaction->quantity) }}"
                               required>

                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- DATE -->
                    <div class="form-group">
                        <label for="transaction_date">Transaction Date *</label>

                        <input type="date"
                               name="transaction_date"
                               id="transaction_date"
                               class="form-control"
                               value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}"
                               required>

                        @error('transaction_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- NOTES -->
                    <div class="form-group">
                        <label for="notes">Notes (Optional)</label>

                        <textarea name="notes"
                                  id="notes"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter additional details...">{{ old('notes', $transaction->notes) }}</textarea>

                        @error('notes')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="staff-form-actions">

                    <a href="{{ route('admin.inventory.transactions.index') }}"
                       class="staff-cancel-btn">
                        Cancel
                    </a>

                    <button type="submit" class="staff-save-btn">
                        <i class="fas fa-save"></i> Update Transaction
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
