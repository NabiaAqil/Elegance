@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <div class="container">

        <div class="dashboard-header">
            <div>
                <h2 class="section-heading">Inventory Overview</h2>
                <p>View available salon products and current stock levels.</p>
            </div>
        </div>

        <div class="appointments-wrapper">

            <div class="appointments-table-wrapper">

                <table class="appointments-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Available Quantity</th>
                            <th>Stock Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($items as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>{{ $item->name }}</strong>
                                </td>

                                <td>{{ $item->brand ?? 'N/A' }}</td>

                                <td>{{ $item->quantity }}</td>

                                <td>
                                    @if($item->isLowStock())
                                        <span class="badge low-stock">
                                            Low Stock
                                        </span>
                                    @else
                                        <span class="badge in-stock">
                                            In Stock
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center">
                                    No inventory products available.
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
