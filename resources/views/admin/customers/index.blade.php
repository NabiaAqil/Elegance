
@extends('admin.layouts.app')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Customer Management</h2>
            <p>Manage all registered salon customers.</p>
        </div>

        <div class="staff-summary">
            <div class="staff-summary-card">
                <span>Total Customers</span>
                <h3>{{ $customers->count() }}</h3>
            </div>
        </div>
    </div>

    <div class="staff-table-card">

        <div class="staff-table-heading">
            <h3>Registered Customers</h3>
        </div>

        <div class="table-responsive">
            <table class="staff-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Email Address</th>
                        <th>Registered On</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($customers as $customer)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <div class="staff-info">
                                    <div class="staff-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>

                                    <strong>{{ $customer->name }}</strong>
                                </div>
                            </td>

                            <td>{{ $customer->email }}</td>

                            <td>
                                {{ $customer->created_at?->format('d M Y') ?? 'N/A' }}
                            </td>
                            <td>
   
    <div class="staff-actions">
        <a href="{{ route('admin.customers.show', $customer->id) }}"
           class="staff-action-btn edit-btn">
            <i class="fas fa-eye"></i> View
        </a>

        <a href="{{ route('admin.customers.edit', $customer->id) }}"
           class="staff-action-btn edit-btn">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>



</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
                                No customers registered yet.
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
