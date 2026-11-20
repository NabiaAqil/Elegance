
@extends('admin.layouts.app')

@section('title', 'Supplier Details - Elegance Salon')
@section('page-heading', 'Supplier Details')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Supplier Details</h2>
            <p>Complete supplier information and supplied products.</p>
        </div>

        <a href="{{ route('admin.suppliers.index') }}" class="staff-back-btn">
            <i class="fas fa-arrow-left"></i> Back to Suppliers
        </a>
    </div>

    <div class="staff-table-card">

        <div class="staff-table-heading">
            <h3>{{ $supplier->name }}</h3>

            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
               class="staff-action-btn edit-btn">
                <i class="fas fa-edit"></i> Edit Supplier
            </a>
        </div>

        <div class="customer-details-grid">

            <div class="customer-detail-item">
                <span>Supplier Name</span>
                <strong>{{ $supplier->name }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Contact Person</span>
                <strong>{{ $supplier->contact_person ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Phone Number</span>
                <strong>{{ $supplier->phone ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Email Address</span>
                <strong>{{ $supplier->email ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Address</span>
                <strong>{{ $supplier->address ?? 'N/A' }}</strong>
            </div>

            <div class="customer-detail-item">
                <span>Total Products Supplied</span>
                <strong>{{ $supplier->inventoryItems->count() }}</strong>
            </div>

        </div>

    </div>

    <div class="staff-table-card" style="margin-top: 25px;">

        <div class="staff-table-heading">
            <h3>Supplied Inventory Products</h3>
            <span>{{ $supplier->inventoryItems->count() }} Products</span>
        </div>

        @if($supplier->inventoryItems->count() > 0)

            <div class="table-responsive">
                <table class="staff-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Available Stock</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supplier->inventoryItems as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->name }}</td>

                                <td>{{ $item->brand ?? 'N/A' }}</td>

                                <td>{{ $item->quantity }}</td>

                                <td>
                                    {{ $item->price !== null ? number_format($item->price, 2) : 'N/A' }}
                                </td>

                                <td>
                                    @if($item->isLowStock())
                                        <span class="status-badge status-cancelled">
                                            Low Stock
                                        </span>
                                    @else
                                        <span class="status-badge status-completed">
                                            In Stock
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        @else

            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>No Products Linked</h3>
                <p>No inventory products are currently assigned to this supplier.</p>
            </div>

        @endif

    </div>

</div>

@endsection
