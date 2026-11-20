
@extends('admin.layouts.app')

@section('title', 'Inventory Management - Elegance Salon')
@section('page-heading', 'Inventory Management')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Inventory Management</h2>
            <p>Manage salon products and available stock.</p>
        </div>

        <a href="{{ route('admin.inventory.create') }}" class="staff-save-btn">
            <i class="fas fa-plus"></i> Add New Item
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($items->count() > 0)

        <div class="staff-table-card">

            <div class="staff-table-heading">
                <h3>Inventory Items</h3>
                <span>{{ $items->count() }} Items</span>
            </div>

            <div class="table-responsive">
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Supplier</th>
                            <th>Available Stock</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->name }}</td>

                                <td>{{ $item->brand ?? 'N/A' }}</td>

                                <td>
                                    {{ $item->supplier?->name ?? 'Not Assigned' }}
                                </td>

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

                                <td>
                                    <div class="staff-actions">
                                        <a href="{{ route('admin.inventory.edit', $item->id) }}"
                                           class="staff-action-btn edit-btn">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    @else

        <div class="staff-table-card">
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>No Inventory Items Found</h3>
                <p>Add your first salon inventory item.</p>

                <a href="{{ route('admin.inventory.create') }}" class="staff-save-btn">
                    Add Inventory Item
                </a>
            </div>
        </div>

    @endif

</div>

@endsection
