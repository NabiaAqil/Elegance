<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $items = InventoryItem::with('supplier')->latest()->get();

        return view('admin.inventory.index', compact('items'));
    }

    public function create()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $suppliers = Supplier::orderBy('name')->get();

        return view('admin.inventory.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'supplier_id' => 'nullable|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'low_stock_alert' => 'required|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);

        InventoryItem::create($validated);

        return redirect()
            ->route('admin.inventory.index')
            ->with('success', 'Inventory item added successfully!');
    }

    public function edit(InventoryItem $item)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $suppliers = Supplier::orderBy('name')->get();

        return view('admin.inventory.edit', compact('item', 'suppliers'));
    }

    public function update(Request $request, InventoryItem $item)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'supplier_id' => 'nullable|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'low_stock_alert' => 'required|integer|min:0',
            'price' => 'nullable|numeric|min:0',
        ]);

        $item->update($validated);

        return redirect()
            ->route('admin.inventory.index')
            ->with('success', 'Inventory item updated successfully!');
    }

    public function destroy(InventoryItem $item)
    {
        abort(403, 'Inventory items cannot be deleted.');
    }
}
