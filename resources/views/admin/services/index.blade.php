
@extends('admin.layouts.app')

@section('content')

<div class="staff-management">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="staff-page-header">
        <div>
            <h2>Services Management</h2>
            <p>Manage all salon services.</p>
        </div>

        <div class="staff-summary">
            <div class="staff-summary-card">
                <span>Total Services</span>
                <h3>{{ $services->count() }}</h3>
            </div>
        </div>
    </div>

    <div class="staff-table-card">

        <div class="staff-table-heading">
            <h3>All Services</h3>
        </div>

        <div class="table-responsive">
            <table class="staff-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Service Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
    @if($service->image)
        <img src="{{ asset('images/' . $service->image) }}"
             alt="{{ $service->name }}"
             width="55"
             height="55"
             style="object-fit: cover; border-radius: 8px;">
    @else
        N/A
    @endif
</td>

                        <td>{{ $service->name }}</td>

                        <td>{{ $service->category?->name ?? 'N/A' }}</td>

                        <td>Rs. {{ number_format($service->price, 2) }}</td>

                        <td>{{ $service->duration }}</td>

                        <td>
                           <div class="staff-actions">
    <a href="{{ route('admin.services.show', $service->id) }}"
       class="staff-action-btn edit-btn">
        <i class="fas fa-eye"></i> View
    </a>

    <a href="{{ route('admin.services.edit', $service->id) }}"
       class="staff-action-btn edit-btn">
        <i class="fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('admin.services.destroy', $service->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this service?');">

    @csrf
    @method('DELETE')

    <button type="submit" class="staff-action-btn edit-btn">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
</div>       </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            No services found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
