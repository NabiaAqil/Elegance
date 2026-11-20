
@extends('admin.layouts.app')

@section('title', 'Customer Feedback - Elegance Salon')
@section('page-heading', 'Customer Feedback')

@section('content')

<div class="staff-management">

    <div class="staff-page-header">
        <div>
            <h2>Customer Feedback</h2>
            <p>View ratings and feedback submitted by salon customers.</p>
        </div>
    </div>

    <div class="staff-table-wrapper">
        <table class="staff-table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($reviews as $review)
                    <tr>
                        <td>
                            {{ $review->customer->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $review->service->name ?? 'N/A' }}
                        </td>

                        <td>
                            <span class="review-rating">
                                {{ $review->rating }} / 5
                                <span class="review-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </span>
                        </td>

                        <td class="review-comment">
                            {{ $review->comment ?: 'No written feedback' }}
                        </td>

                        <td>
                            {{ $review->created_at->format('d M Y') }}
                        </td>
                        <td>
    <form action="{{ route('admin.reviews.destroy', $review->id) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete this feedback?');">

        @csrf
        @method('DELETE')

        <button type="submit" class="review-delete-btn">
            <i class="fas fa-trash"></i> Delete
        </button>
    </form>
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            No customer feedback available yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
