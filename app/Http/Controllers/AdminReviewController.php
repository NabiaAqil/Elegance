<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class AdminReviewController extends Controller
{
    public function index()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $reviews = Review::with([
            'customer',
            'service',
            'appointment'
        ])
        ->latest()
        ->get();

        return view('admin.reviews.index', compact('reviews'));
    }
public function destroy(Review $review)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $review->delete();

    return redirect()
        ->route('admin.reviews.index')
        ->with('success', 'Customer feedback deleted successfully.');
}



}