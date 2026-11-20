<?php
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Models\InventoryItem;
use App\Http\Controllers\InventoryTransactionController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Models\Service;
use App\Models\StaffProfile;
use App\Models\StaffUnavailableDate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// 1. PUBLIC HOME PAGE
Route::get('/', function () {

    $reviews = \App\Models\Review::with(['customer', 'service'])
        ->latest()
        ->take(6)
        ->get();

    return view('home', compact('reviews'));

})->name('home');



// 2. BOOK APPOINTMENT PAGE
Route::get('/book-appointment', function () {

    $services = Service::with('category')->get();

    return view('book-appointment', compact('services'));

})->name('book-appointment');
Route::get('/appointment/confirmation/{id}', [AppointmentController::class, 'confirmation'])
    ->middleware('auth')
    ->name('appointment.confirmation');




    
Route::view('/contact', 'contact')->name('contact');

// 3. AJAX STAFF FILTERING
Route::get(
    '/appointment/staff/{serviceId}',
    [AppointmentController::class, 'getStaffByService']
)->name('appointment.staff');


// 4. CUSTOMER DASHBOARD
Route::get('/dashboard', function () {

    $appointments = App\Models\Appointment::where(
        'customer_id',
        Auth::id()
    )
    ->orderBy('appointment_date', 'desc')
    ->get();

    return view('dashboard', compact('appointments'));

})->middleware(['auth', 'verified'])->name('dashboard');


// 5. PROFILE ROUTES
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// 6. APPOINTMENT STORE & CHECK ROUTES
Route::post(
    '/appointment',
    [AppointmentController::class, 'store']
)->name('appointment.store');

Route::get(
    '/check-staff-availability',
    [AppointmentController::class, 'checkAvailability']
)->name('appointment.check');


// 7. SERVICES ROUTES

// Facial
Route::get('/services/facial', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'facial-skin-care');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Facial & Skin Care'
    )->take(3)->get();

    return view('services.facial', compact('services', 'experts'));

})->name('services.facial');


// Makeup
Route::get('/services/makeup', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'makeup-services');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Makeup Services'
    )->take(3)->get();

    return view('services.makeup', compact('services', 'experts'));

})->name('services.makeup');


// Bridal
Route::get('/services/bridal', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'bridal-makeup');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Bridal Makeup'
    )->take(3)->get();

    return view('services.bridal', compact('services', 'experts'));

})->name('services.bridal');


// Hair
Route::get('/services/hair', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'hair-styling-care');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Hair Styling & Care'
    )->take(3)->get();

    return view('services.hair', compact('services', 'experts'));

})->name('services.hair');


// Manicure & Pedicure
Route::get('/services/manicure-pedicure', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'manicure-pedicure');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Manicure & Pedicure'
    )->take(3)->get();

    return view(
        'services.manicure-pedicure',
        compact('services', 'experts')
    );

})->name('services.manicure-pedicure');


// Spa
Route::get('/services/spa', function () {

    $services = Service::whereHas('category', function ($query) {
        $query->where('slug', 'spa-relaxation');
    })->get();

    $experts = StaffProfile::where(
        'specialization',
        'Spa & Relaxation'
    )->take(3)->get();

    return view('services.spa', compact('services', 'experts'));

})->name('services.spa');


// SERVICE DETAIL ROUTES

Route::get('/services/facial/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.facial-detail',
        compact('service', 'relatedServices')
    );

})->name('services.facial.detail');


Route::get('/services/makeup/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.makeup-detail',
        compact('service', 'relatedServices')
    );

})->name('services.makeup.detail');


Route::get('/services/bridal/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.bridal-detail',
        compact('service', 'relatedServices')
    );

})->name('services.bridal.detail');


Route::get('/services/hair/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.hair-detail',
        compact('service', 'relatedServices')
    );

})->name('services.hair.detail');


Route::get('/services/manicure-pedicure/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.manicure-pedicure-detail',
        compact('service', 'relatedServices')
    );

})->name('services.manicure-pedicure.detail');


Route::get('/services/spa/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    $relatedServices = Service::where(
        'category_id',
        $service->category_id
    )
    ->where('id', '!=', $service->id)
    ->take(3)
    ->get();

    return view(
        'services.spa-detail',
        compact('service', 'relatedServices')
    );

})->name('services.spa.detail');


// 8. ALL STAFF PAGE
Route::get('/our-staff', function () {

    $allStaff = StaffProfile::with('user')->get();

    return view('our-staff', compact('allStaff'));

})->name('our-staff');


// 9. STAFF DASHBOARD & PROFILE
Route::middleware(['auth'])->group(function () {

    // Staff Dashboard
    Route::get('/staff/dashboard', function () {

        $appointments = App\Models\Appointment::where(
            'staff_id',
            Auth::id()
        )
        ->orderBy('appointment_date', 'asc')
        ->get();

        $unavailableDates = StaffUnavailableDate::where(
            'staff_id',
            Auth::id()
        )->get();

        $totalCommission = 0;

        foreach ($appointments as $appointment) {

            if ($appointment->status == 'completed') {

                $rate = Auth::user()->staffProfile->commission_rate ?? 10;

                $totalCommission +=
                    ($appointment->service->price * $rate) / 100;
            }
        }

        return view(
            'staff.dashboard',
            compact(
                'appointments',
                'unavailableDates',
                'totalCommission'
            )
        );

    })->name('staff.dashboard');


    // Mark Unavailable Date
    Route::post('/staff/unavailable-date', function (
        Illuminate\Http\Request $request
    ) {

        $request->validate([
            'unavailable_date' => 'required|date|after_or_equal:today',
            'reason' => 'nullable|string',
        ]);

        StaffUnavailableDate::create([
            'staff_id' => Auth::id(),
            'unavailable_date' => $request->unavailable_date,
            'reason' => $request->reason,
        ]);

        return back()->with(
            'success',
            'Date marked as unavailable successfully!'
        );

    })->name('staff.unavailable.store');


    // Staff Profile Edit
    Route::get('/staff/profile', function () {

        $profile = StaffProfile::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        return view('staff.profile', compact('profile'));

    })->name('staff.profile.edit');


    // Update Staff Profile
    Route::post('/staff/profile', function (
        Illuminate\Http\Request $request
    ) {

        $request->validate([
            'specialization' => 'required|string',
            'bio' => 'nullable|string',
            'experience_years' => 'nullable|integer',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profile = StaffProfile::firstOrCreate([
            'user_id' => Auth::id()
        ]);

        $data = $request->only([
            'specialization',
            'bio',
            'experience_years',
            'commission_rate',
        ]);

        if ($request->hasFile('profile_image')) {

            if (
                $profile->profile_image &&
                file_exists(
                    public_path('images/staff/' . $profile->profile_image)
                )
            ) {
                unlink(
                    public_path('images/staff/' . $profile->profile_image)
                );
            }

            $imageName = time() . '.' .
                $request->profile_image->extension();

            $request->profile_image->move(
                public_path('images/staff'),
                $imageName
            );

            $data['profile_image'] = $imageName;
        }

        $profile->update($data);

        return back()->with(
            'success',
            'Profile updated successfully!'
        );

    })->name('staff.profile.update');


    // Update Appointment Status
    Route::post('/staff/appointment/status/{id}', function (
        Illuminate\Http\Request $request,
        $id
    ) {
 $appointment = App\Models\Appointment::where('id', $id)
 ->where('staff_id', Auth::id())
->firstOrFail();
$appointment->status = $request->status;
$appointment->save();
return back()->with('success','Appointment status updated successfully!');
})->name('staff.appointment.status');
});

// INVENTORY - SUPPLIER ROUTES

Route::middleware(['auth'])->prefix('inventory')->name('inventory.')->group(function () {
Route::resource('suppliers', SupplierController::class);
});

// INVENTORY ROUTES

Route::middleware(['auth'])->prefix('inventory')->name('inventory.')->group(function () {
Route::resource('suppliers', SupplierController::class);
Route::resource('items', InventoryController::class);
Route::resource('transactions', InventoryTransactionController::class);
});

// STAFF - VIEW INVENTORY (READ ONLY)

Route::get('/staff/inventory', function () {
abort_unless(Auth::user()->role === 'staff', 403);
$items = InventoryItem::orderBy('name')->get();
return view('staff.inventory', compact('items'));
})->name('staff.inventory');


// --------
Route::middleware(['auth'])->group(function () {
Route::post('/appointments/{appointment}/review',
[ReviewController::class, 'store']
)->name('reviews.store');
});






// ADMIN PANEL ROUTES

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
Route::get('/dashboard', [AdminController::class, 'index'])
->name('dashboard');
Route::get('/staff', [AdminController::class, 'staffIndex'])
->name('staff.index');
Route::get('/staff/{id}/edit', [AdminController::class, 'staffEdit'])
->name('staff.edit');
Route::put('/staff/{id}', [AdminController::class, 'staffUpdate'])
->name('staff.update');
Route::delete('/staff/{id}', [AdminController::class, 'staffDestroy'])
->name('staff.destroy');
Route::get('/staff/create', [AdminController::class, 'staffCreate'])
->name('staff.create');
Route::post('/staff', [AdminController::class, 'staffStore'])
->name('staff.store');
Route::get('/customers', [AdminController::class, 'customerIndex'])
->name('customers.index');
Route::get('/customers/{id}', [AdminController::class, 'customerShow'])
->name('customers.show');
Route::get('/customers/{id}/edit', [AdminController::class, 'customerEdit'])
->name('customers.edit');
Route::put('/customers/{id}', [AdminController::class, 'customerUpdate'])
->name('customers.update');
Route::get('/appointments', [AdminController::class, 'appointmentIndex'])
->name('appointments.index');
Route::put('/appointments/{id}/status', [AdminController::class, 'appointmentUpdateStatus'])
->name('appointments.updateStatus');
Route::get('/appointments/{id}', [AdminController::class, 'appointmentShow'])
->name('appointments.show');
Route::get('/services', [AdminController::class, 'serviceIndex'])
->name('services.index');
Route::get('/services/{id}', [AdminController::class, 'serviceShow'])
->name('services.show');
Route::get('/services/{id}/edit', [AdminController::class, 'serviceEdit'])
->name('services.edit');
Route::put('/services/{id}', [AdminController::class, 'serviceUpdate'])
->name('services.update');
Route::delete('/services/{id}', [AdminController::class, 'serviceDestroy'])
->name('services.destroy');
// INVENTORY MANAGEMENT
Route::get('/inventory', [InventoryController::class, 'index'])
->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])
->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])
->name('inventory.store');
Route::get('/inventory/{item}/edit', [InventoryController::class, 'edit'])
->name('inventory.edit');
Route::put('/inventory/{item}', [InventoryController::class, 'update'])
->name('inventory.update');

// INVENTORY TRANSACTIONS
Route::get('/inventory/transactions', [InventoryTransactionController::class, 'index'])
->name('inventory.transactions.index');
Route::get('/inventory/transactions/create', [InventoryTransactionController::class, 'create'])
->name('inventory.transactions.create');
Route::post('/inventory/transactions', [InventoryTransactionController::class, 'store'])
->name('inventory.transactions.store');
Route::get('/inventory/transactions/{transaction}/edit', [InventoryTransactionController::class, 'edit'])
->name('inventory.transactions.edit');
Route::put('/inventory/transactions/{transaction}', [InventoryTransactionController::class, 'update'])
->name('inventory.transactions.update');

// SUPPLIER MANAGEMENT
Route::get('/suppliers', [SupplierController::class, 'index'])
->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])
->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])
->name('suppliers.store');
Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])
->name('suppliers.edit');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])
->name('suppliers.update');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])
->name('suppliers.show');
// feedback route
Route::get('/feedback', [ReviewController::class, 'index'])
->name('feedback.index');
Route::get('/reviews', [AdminReviewController::class, 'index'])
->name('reviews.index');
Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])
->name('reviews.destroy');




});







// AUTH ROUTES
require __DIR__ . '/auth.php';
