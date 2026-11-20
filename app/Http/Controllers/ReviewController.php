<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Submit Customer Review
    public function store(Request $request, Appointment $appointment)
    {
        abort_unless(Auth::user()->role === 'customer', 403);

        // Check appointment ownership
        abort_unless(
            $appointment->customer_id === Auth::id(),
            403
        );

        // Only completed appointments can be reviewed
        if ($appointment->status !== 'completed') {
            return back()->with(
                'error',
                'You can only review completed appointments.'
            );
        }

        // Prevent duplicate reviews
        if ($appointment->review()->exists()) {
            return back()->with(
                'error',
                'You have already reviewed this appointment.'
            );
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'appointment_id' => $appointment->id,
            'customer_id' => Auth::id(),
            'service_id' => $appointment->service_id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with(
            'success',
            'Thank you! Your review has been submitted.'
        );
    }

// Admin Feedback Management
public function index()
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $reviews = Review::with([
        'customer',
        'service',
        'appointment'
    ])->latest()->get();

    return view('admin.reviews.index', compact('reviews'));
}


}
