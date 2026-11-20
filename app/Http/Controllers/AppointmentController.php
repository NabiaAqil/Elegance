<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\StaffUnavailableDate;
use App\Models\StaffProfile;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Get staff according to selected service
    public function getStaffByService($serviceId)
    {
        $service = Service::with('category')->findOrFail($serviceId);

        $categoryName = $service->category->name;

        $staff = StaffProfile::with('user')
            ->where('specialization', $categoryName)
            ->whereHas('user', function ($query) {
                $query->where('role', 'staff');
            })
            ->get()
            ->map(function ($profile) {
                return [
                    'id' => $profile->user->id,
                    'name' => $profile->user->name,
                ];
            });

        return response()->json($staff);
    }


    // Store appointment
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        // Check selected service
        $service = Service::with('category')
            ->findOrFail($request->service_id);

        // Verify that selected staff belongs to selected service
        $validStaff = StaffProfile::where('user_id', $request->staff_id)
            ->where('specialization', $service->category->name)
            ->whereHas('user', function ($query) {
                $query->where('role', 'staff');
            })
            ->exists();

        if (!$validStaff) {
            return back()
                ->withErrors([
                    'staff_id' => 'Please select a valid expert for this service.'
                ])
                ->withInput();
        }

        // Check staff availability
        $isUnavailable = StaffUnavailableDate::where(
                'staff_id',
                $request->staff_id
            )
            ->where('unavailable_date', $request->appointment_date)
            ->exists();

        if ($isUnavailable) {
            return back()
                ->withErrors([
                    'appointment_date' => 'This expert is not available on the selected date. Please choose another date.'
                ])
                ->withInput();
        }

        // Update user phone if empty
        $user = Auth::user();

        if (empty($user->phone)) {
            $user->phone = $request->phone;
            $user->save();
        }

        $appointment = Appointment::create([
    'customer_id' => Auth::id(),
    'staff_id' => $request->staff_id,
    'service_id' => $request->service_id,
    'appointment_date' => $request->appointment_date,
    'appointment_time' => $request->appointment_time,
    'notes' => $request->notes,
    'status' => 'pending',
]);

return redirect()->route('appointment.confirmation', $appointment->id);

    }

    // Appointment Confirmation
public function confirmation($id)
{
    $appointment = Appointment::with(['service', 'staff'])
        ->findOrFail($id);

    if ($appointment->customer_id != Auth::id()) {
        abort(403);
    }

    return view('appointment-confirmation', compact('appointment'));
}


    // Check staff availability
    public function checkAvailability(Request $request)
    {
        $isUnavailable = StaffUnavailableDate::where(
                'staff_id',
                $request->staff_id
            )
            ->where('unavailable_date', $request->date)
            ->exists();

        return response()->json([
            'unavailable' => $isUnavailable
        ]);
    }
}
