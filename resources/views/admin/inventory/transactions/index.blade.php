
@extends('admin.layouts.app')

@section('title', 'Stock Transactions - Elegance Salon')
@section('page-heading', 'Stock Transactions')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Inventory Transactions</h2>
            <p>Track stock additions and product usage in your salon.</p>
        </div>

        <a href="{{ route('admin.inventory.transactions.create') }}"
           class="staff-save-btn">
            <i class="fas fa-plus"></i> Add Transaction
        </a>
    </div>

    @if($transactions->count() > 0)

        <div class="staff-table-card">

            <div class="staff-table-heading">
                <h3>Stock Transaction History</h3>
                <span>{{ $transactions->count() }} Transactions</span>
            </div>

            <div class="table-responsive">

                <table class="staff-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Transaction Type</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($transactions as $transaction)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong>
                                        {{ $transaction->inventoryItem->name ?? 'Product Not Available' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $transaction->inventoryItem->brand ?? '—' }}
                                </td>

                                <td>
                                    @if($transaction->type === 'in')
                                        <span class="transaction-badge stock-in">
                                            Stock In
                                        </span>
                                    @else
                                        <span class="transaction-badge stock-out">
                                            Stock Out
                                        </span>
                                    @endif
                                </td>

                                <td>{{ $transaction->quantity }}</td>

                                <td>
                                    {{ $transaction->transaction_date->format('d M, Y') }}
                                </td>

                                <td>{{ $transaction->notes ?? '—' }}</td>

                                <td>
                                    <div class="staff-actions">
                                        <a href="{{ route('admin.inventory.transactions.edit', $transaction->id) }}"
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
                <i class="fas fa-exchange-alt"></i>
                <h3>No Transactions Found</h3>
                <p>Add your first stock transaction.</p>

                <a href="{{ route('admin.inventory.transactions.create') }}"
                   class="staff-save-btn">
                    <i class="fas fa-plus"></i> Add Transaction
                </a>
            </div>
        </div>

    @endif

</div>

@endsection
