<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    // Show all suppliers
    public function index()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $suppliers = Supplier::latest()->get();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    // Show add supplier form
    public function create()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.suppliers.create');
    }

    // Save new supplier
    public function store(Request $request)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        Supplier::create($validated);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier added successfully!');
    }

    // Show edit supplier form
    public function edit(Supplier $supplier)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        return view('admin.suppliers.edit', compact('supplier'));
    }

    // Update supplier
    public function update(Request $request, Supplier $supplier)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
        ]);

        $supplier->update($validated);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier updated successfully!');
    }

    // Deletion will be enabled after checking inventory relationships
    public function destroy(Supplier $supplier)
    {
        abort(403, 'Supplier deletion is currently disabled.');
    }

// Show supplier details
public function show(Supplier $supplier)
{
    abort_unless(Auth::user()->role === 'admin', 403);

    $supplier->load('inventoryItems');

    return view('admin.suppliers.show', compact('supplier'));
}

}
