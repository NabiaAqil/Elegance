<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class InventoryTransactionController extends Controller
{
    // Show all stock transactions
    public function index()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $transactions = InventoryTransaction::with('inventoryItem')
            ->latest('transaction_date')
            ->latest()
            ->get();

        return view('admin.inventory.transactions.index', compact('transactions'));
    }

    // Show add transaction form
    public function create()
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $items = InventoryItem::orderBy('name')->get();

        return view('admin.inventory.transactions.create', compact('items'));
    }

    // Store new stock transaction
    public function store(Request $request)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'inventory_item_id' => 'required|exists:inventory_items,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'transaction_date' => 'required|date',
        ]);

        DB::transaction(function () use ($validated) {

            $item = InventoryItem::whereKey($validated['inventory_item_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($validated['type'] === 'out') {

                if ($item->quantity < $validated['quantity']) {
                    throw ValidationException::withMessages([
                        'quantity' => 'Not enough stock available.',
                    ]);
                }

                $item->quantity -= $validated['quantity'];

            } else {

                $item->quantity += $validated['quantity'];

            }

            $item->save();

            InventoryTransaction::create($validated);
        });

        return redirect()
            ->route('admin.inventory.transactions.index')
            ->with('success', 'Transaction added successfully!');
    }

    // Show edit transaction form
    public function edit(InventoryTransaction $transaction)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $items = InventoryItem::orderBy('name')->get();

        return view('admin.inventory.transactions.edit', compact(
            'transaction',
            'items'
        ));
    }

    // Update transaction
    public function update(Request $request, InventoryTransaction $transaction)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'inventory_item_id' => 'required|exists:inventory_items,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'transaction_date' => 'required|date',
        ]);

        DB::transaction(function () use ($validated, $transaction) {

            $transaction = InventoryTransaction::whereKey($transaction->id)
                ->lockForUpdate()
                ->firstOrFail();

            $itemIds = array_unique([
                $transaction->inventory_item_id,
                (int) $validated['inventory_item_id'],
            ]);

            sort($itemIds);

            $items = InventoryItem::whereIn('id', $itemIds)
                ->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            $oldItem = $items->get($transaction->inventory_item_id);
            $newItem = $items->get((int) $validated['inventory_item_id']);

            // Reverse previous transaction effect
            $oldEffect = $transaction->type === 'in'
                ? $transaction->quantity
                : -$transaction->quantity;

            // Apply updated transaction effect
            $newEffect = $validated['type'] === 'in'
                ? $validated['quantity']
                : -$validated['quantity'];

            $oldItem->quantity -= $oldEffect;

            if ($oldItem->quantity < 0) {
                throw ValidationException::withMessages([
                    'quantity' => 'This transaction cannot be edited because the current stock has already been used.',
                ]);
            }

            if ($oldItem->id === $newItem->id) {

                $oldItem->quantity += $newEffect;

                if ($oldItem->quantity < 0) {
                    throw ValidationException::withMessages([
                        'quantity' => 'Not enough stock available.',
                    ]);
                }

                $oldItem->save();

            } else {

                $newItem->quantity += $newEffect;

                if ($newItem->quantity < 0) {
                    throw ValidationException::withMessages([
                        'quantity' => 'Not enough stock available.',
                    ]);
                }

                $oldItem->save();
                $newItem->save();
            }

            $transaction->update($validated);
        });

        return redirect()
            ->route('admin.inventory.transactions.index')
            ->with('success', 'Transaction updated successfully!');
    }

    // Show transaction (redirect to listing)
    public function show(InventoryTransaction $transaction)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        return redirect()->route('admin.inventory.transactions.index');
    }

    // Transaction deletion is not allowed
    public function destroy(InventoryTransaction $transaction)
    {
        abort_unless(Auth::user()->role === 'admin', 403);

        return redirect()
            ->route('admin.inventory.transactions.index')
            ->with('error', 'Transactions cannot be deleted.');
    }
}
