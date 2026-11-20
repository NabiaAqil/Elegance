<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\StaffProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\InventoryItem;

class AdminController extends Controller
{
    public function index()
    {
        // Only Admin can access
        abort_unless(Auth::user()->role === 'admin', 403);

        // Dashboard Statistics
        $totalStaff = User::where('role', 'staff')->count();

        $totalCustomers = User::where('role', 'customer')->count();

        $totalAppointments = Appointment::count();

        $pendingAppointments = Appointment::where(
            'status',
            'pending'
        )->count();

        // Revenue from completed appointments
        $completedAppointments = Appointment::with('service')
            ->where('status', 'completed')
            ->get();

        $totalRevenue = $completedAppointments->sum(
            fn ($appointment) => $appointment->service->price ?? 0
        );

        // Low Stock Products
        $lowStockItems = InventoryItem::whereColumn(
            'quantity',
            '<=',
            'low_stock_alert'
        )->count();

        // Recent Appointments
        $recentAppointments = Appointment::with([
            'customer',
            'staff',
            'service'
        ])
        ->latest('appointment_date')
        ->take(5)
        ->get();

        return view('admin.dashboard', compact(
            'totalStaff',
            'totalCustomers',
            'totalAppointments',
            'pendingAppointments',
            'totalRevenue',
            'lowStockItems',
            'recentAppointments'
        ));
    }



    // 1. Show All Staff
    public function staffIndex()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $staffMembers = User::where('role', 'staff')
            ->with('staffProfile')
            ->latest()
            ->get();

        return view('admin.staff.index', compact('staffMembers'));
    }
    // Show All Customers
public function customerIndex()
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $customers = User::where('role', 'customer')
    ->latest()
    ->get();

    return view('admin.customers.index', compact('customers'));
}

    // Show Edit Staff Form
    public function staffEdit($id)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->with('staffProfile')
            ->findOrFail($id);

        return view('admin.staff.edit', compact('staff'));
    }
// Show Customer Details
public function customerShow($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $customer = User::where('role', 'customer')
        ->findOrFail($id);

    $appointments = Appointment::with(['service', 'staff'])
        ->where('customer_id', $customer->id)
        ->latest('appointment_date')
        ->get();

    return view('admin.customers.show', compact(
        'customer',
        'appointments'
    ));
}
// Show Edit Customer Form
public function customerEdit($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $customer = User::where('role', 'customer')
        ->findOrFail($id);

    return view('admin.customers.edit', compact('customer'));
}


// Update Customer Information
public function customerUpdate(Request $request, $id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $customer = User::where('role', 'customer')
        ->findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $customer->id,
    ]);

    $customer->update($validated);

    return redirect()
        ->route('admin.customers.index')
        ->with('success', 'Customer information updated successfully!');
}

    // Update Staff Information
    public function staffUpdate(Request $request, $id)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $staff = User::where('role', 'staff')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $staff->id,
            'specialization' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'commission_rate' => 'required|numeric|min:0|max:100',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $profile = \App\Models\StaffProfile::firstOrCreate(
            ['user_id' => $staff->id],
            ['specialization' => $request->specialization]
        );

        $data = $request->only([
            'specialization',
            'bio',
            'experience_years',
            'commission_rate',
        ]);

        if ($request->hasFile('profile_image')) {

            $oldImage = $profile->profile_image;

            $imageName = time() . '.' .
                $request->file('profile_image')->extension();

            $request->file('profile_image')->move(
                public_path('images/staff'),
                $imageName
            );

            $data['profile_image'] = $imageName;

            if (
                $oldImage &&
                file_exists(public_path('images/staff/' . $oldImage))
            ) {
                unlink(public_path('images/staff/' . $oldImage));
            }
        }

        $profile->update($data);

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member updated successfully!');
    }




    // Delete Staff Member
    public function staffDestroy($id)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $staff = User::where('role', 'staff')
            ->findOrFail($id);

        // Check whether staff has appointments
        $hasAppointments = Appointment::where('staff_id', $staff->id)
            ->exists();

        if ($hasAppointments) {
            return redirect()
                ->route('admin.staff.index')
                ->with('error', 'This staff member has appointment records. Please reassign or resolve them before deletion.');
        }

        // Delete profile image if it exists
        $image = $staff->staffProfile?->profile_image;

        if ($image && file_exists(public_path('images/staff/' . $image))) {
            unlink(public_path('images/staff/' . $image));
        }

        // Delete staff account
        $staff->delete();

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member deleted successfully!');
    }
// Show Add Staff Form
public function staffCreate()
{
    abort_unless(Auth::user()->role === 'admin', 403);

    return view('admin.staff.create');
}


// Save New Staff
public function staffStore(Request $request)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'specialization' => 'required|string|max:255',
        'bio' => 'nullable|string',
        'experience_years' => 'nullable|integer|min:0',
        'commission_rate' => 'required|numeric|min:0|max:100',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Create Staff Account
    $staff = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'staff',
    ]);

    // Upload Profile Image
    $imageName = null;

    if ($request->hasFile('profile_image')) {
        $directory = public_path('images/staff');

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $imageName = time() . '_' . uniqid() . '.' .
            $request->file('profile_image')->extension();

        $request->file('profile_image')->move($directory, $imageName);
    }

    // Create Staff Profile
    StaffProfile::create([
        'user_id' => $staff->id,
        'specialization' => $validated['specialization'],
        'bio' => $validated['bio'] ?? null,
        'experience_years' => $validated['experience_years'] ?? null,
        'commission_rate' => $validated['commission_rate'],
        'profile_image' => $imageName,
    ]);

    return redirect()
        ->route('admin.staff.index')
        ->with('success', 'New staff member added successfully!');
}

// Show All Appointments
public function appointmentIndex(Request $request)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $query = Appointment::with([
        'customer',
        'staff',
        'service'
    ]);

    // Search Customer Name
    if ($request->filled('search')) {
        $search = $request->search;

        $query->whereHas('customer', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });
    }

    // Filter by Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter by Date
    if ($request->filled('date')) {
        $query->whereDate('appointment_date', $request->date);
    }

    $appointments = $query
        ->latest('appointment_date')
        ->latest('appointment_time')
        ->get();

    return view('admin.appointments.index', compact('appointments'));
}
// Update Appointment Status
public function appointmentUpdateStatus(Request $request, $id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $validated = $request->validate([
        'status' => 'required|in:confirmed,cancelled',
    ]);

    $appointment = Appointment::findOrFail($id);

    if ($appointment->status !== 'pending') {
        return redirect()
            ->route('admin.appointments.index')
            ->with('error', 'Only pending appointments can be updated.');
    }

    $appointment->update([
        'status' => $validated['status'],
    ]);

    return redirect()
        ->route('admin.appointments.index')
        ->with('success', 'Appointment status updated successfully!');
}

// View Appointment Details
public function appointmentShow($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $appointment = Appointment::with([
        'customer',
        'staff',
        'service'
    ])->findOrFail($id);

    return view('admin.appointments.show', compact('appointment'));
}



// Show All Services
public function serviceIndex()
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $services = \App\Models\Service::with('category')
        ->latest()
        ->get();

    return view('admin.services.index', compact('services'));
}


// View Service Details
public function serviceShow($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $service = \App\Models\Service::with('category')
        ->findOrFail($id);

    return view('admin.services.show', compact('service'));
}


// Edit Service Form
public function serviceEdit($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $service = \App\Models\Service::findOrFail($id);

    $categories = \App\Models\Category::orderBy('name')->get();

    return view('admin.services.edit', compact(
        'service',
        'categories'
    ));
}

// Update Service
public function serviceUpdate(Request $request, $id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $service = \App\Models\Service::findOrFail($id);

    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
        'short_description' => 'nullable|string',
        'brands_used' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'duration' => 'required|string|max:100',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
    ]);

    $data = $request->only([
        'category_id',
        'name',
        'slug',
        'short_description',
        'brands_used',
        'price',
        'duration',
    ]);

    if ($request->hasFile('image')) {

        // Choose the correct existing category image folder
        $category = \App\Models\Category::findOrFail($validated['category_id']);

        $folders = [
            'facial-skin-care' => 'facial',
            'makeup-services' => 'makeup',
            'bridal-makeup' => 'bridal',
            'hair-styling-care' => 'hair',
            'manicure-pedicure' => 'nails',
            'spa-relaxation' => 'spa',
        ];

        $folder = $folders[$category->slug]
            ?? dirname($service->image ?: 'services/default.jpg');

        $directory = public_path('images/' . $folder);

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $imageName = time() . '_' . uniqid() . '.' .
            $request->file('image')->extension();

        $request->file('image')->move($directory, $imageName);

        $oldImage = $service->image;

        $data['image'] = $folder . '/' . $imageName;

        // Delete old image only after the new image is saved
        if ($oldImage && file_exists(public_path('images/' . $oldImage))) {
            unlink(public_path('images/' . $oldImage));
        }
    }

    $service->update($data);

    return redirect()
        ->route('admin.services.index')
        ->with('success', 'Service updated successfully!');
}

// Delete Service
public function serviceDestroy($id)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $service = \App\Models\Service::findOrFail($id);

    // Check if service has existing appointments
    $hasAppointments = Appointment::where('service_id', $id)->exists();

    if ($hasAppointments) {
        return redirect()
            ->route('admin.services.index')
            ->with('error', 'This service cannot be deleted because it has existing appointments.');
    }

    $service->delete();

    return redirect()
        ->route('admin.services.index')
        ->with('success', 'Service deleted successfully!');
}










}
