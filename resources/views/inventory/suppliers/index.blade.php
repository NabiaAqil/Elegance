@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Supplier Management</h2>
                <p class="text-muted">
                    Manage your salon suppliers and their contact details.
                </p>
            </div>

            <a href="{{ route('inventory.suppliers.create') }}"
               class="btn-primary-pink">
                + Add New Supplier
            </a>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        {{-- SUPPLIERS TABLE --}}
        <div class="appointments-wrapper">

            <div class="appointments-table-wrapper">

                <table class="appointments-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier Name</th>
                            <th>Contact Person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($suppliers as $supplier)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $supplier->name }}</strong>
                                </td>

                                <td>
                                    {{ $supplier->contact_person ?? '—' }}
                                </td>

                                <td>
                                    {{ $supplier->phone ?? '—' }}
                                </td>

                                <td>
                                    {{ $supplier->email ?? '—' }}
                                </td>

                                <td>
                                    {{ $supplier->address ?? '—' }}
                                </td>

                                <td>
                                    <div class="supplier-actions">

                                        <a href="{{ route('inventory.suppliers.edit', $supplier->id) }}"
                                           class="btn-outline-dark">
                                            Edit
                                        </a>

                                        <form action="{{ route('inventory.suppliers.destroy', $supplier->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this supplier?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-danger">
                                                Delete
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    No suppliers found. Add your first supplier!
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>


{{-- SUPPLIER ACTIONS STYLING --}}
<style>
    .supplier-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .supplier-actions form {
        margin: 0;
    }

    .supplier-actions a,
    .supplier-actions button {
        padding: 7px 13px;
        border-radius: 6px;
        font-size: 12px;
        text-decoration: none;
        cursor: pointer;
    }

    .supplier-actions .btn-danger {
        background: var(--burgundy);
        color: var(--text-light);
        border: none;
    }

    .supplier-actions .btn-danger:hover {
        background: var(--deep-wine);
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }
</style>

@endsection
