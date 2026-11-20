
@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        {{-- PAGE HEADER --}}
        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Inventory Management</h2>
                <p class="text-muted">
                    Manage salon products and monitor available stock.
                </p>
            </div>

            <a href="{{ route('inventory.items.create') }}"
               class="btn-primary-pink">
                + Add New Item
            </a>
        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        {{-- INVENTORY TABLE --}}
        <div class="appointments-wrapper">

            <div class="appointments-table-wrapper">

                <table class="appointments-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($items as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $item->name }}</strong>
                                </td>

                                <td>
                                    {{ $item->brand ?? '—' }}
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    {{ $item->price !== null ? 'Rs. ' . number_format($item->price, 2) : '—' }}
                                </td>

                                <td>
                                    @if($item->isLowStock())
                                        <span class="stock-badge low-stock">
                                            Low Stock
                                        </span>
                                    @else
                                        <span class="stock-badge in-stock">
                                            In Stock
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="inventory-actions">

                                        <a href="{{ route('inventory.items.edit', $item->id) }}"
                                           class="btn-outline-dark">
                                            Edit
                                        </a>

                                        

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    No inventory items found. Add your first item!
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</section>



@endsection
