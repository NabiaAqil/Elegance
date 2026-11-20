
@extends('admin.layouts.app')

@section('title', 'Supplier Management - Elegance Salon')
@section('page-heading', 'Supplier Management')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Supplier Management</h2>
            <p>Manage salon product suppliers and their contact details.</p>
        </div>

        <a href="{{ route('admin.suppliers.create') }}" class="staff-save-btn">
            <i class="fas fa-plus"></i> Add New Supplier
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($suppliers->count() > 0)

        <div class="staff-table-card">

            <div class="staff-table-heading">
                <h3>All Suppliers</h3>
                <span>{{ $suppliers->count() }} Suppliers</span>
            </div>

            <div class="table-responsive">
                <table class="staff-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier Name</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Products Supplied</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $supplier->name }}</td>

                                <td>{{ $supplier->contact_person ?? 'N/A' }}</td>

                                <td>{{ $supplier->phone ?? 'N/A' }}</td>

                                <td>{{ $supplier->email ?? 'N/A' }}</td>

                                <td>{{ $supplier->inventoryItems()->count() }}</td>

                                <td>
                                    <div class="staff-actions">
<a href="{{ route('admin.suppliers.show', $supplier->id) }}"
   class="staff-action-btn">
    <i class="fas fa-eye"></i> View
</a>
                                        <a href="{{ route('admin.suppliers.edit', $supplier->id) }}"
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
                <i class="fas fa-truck"></i>
                <h3>No Suppliers Found</h3>
                <p>Add your first salon product supplier.</p>

                <a href="{{ route('admin.suppliers.create') }}" class="staff-save-btn">
                    <i class="fas fa-plus"></i> Add Supplier
                </a>
            </div>
        </div>

    @endif

</div>

@endsection
