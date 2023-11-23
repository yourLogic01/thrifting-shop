<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseDataTable;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseDataTable $dataTable)
    {
        return $dataTable->render('purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all(); // Gantilah 'Supplier' dengan model dan tabel supplier Anda
        return view('purchases.create-purchase', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'paid_amount' => 'required',
            'note' => 'required',
        ]);
        Purchase::create($data);

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchase::with('products')->findOrFail($id);
        $items = $purchase->items;
        $supplier = $purchase->supplier;

        // Calculate discount, tax, shipping, and total amount
        $discountAmount = $purchase->calculateDiscount(); // Implement the logic in your Purchase model
        $taxAmount = $purchase->calculateTax(); // Implement the logic in your Purchase model
        $shippingAmount = $purchase->shipping_amount; // Replace with your actual shipping amount
        $totalAmount = $purchase->calculateTotalAmount(); // Implement the logic in your Purchase model

        return view('purchases.show-purchase', compact('purchase', 'items', 'supplier', 'discountAmount', 'taxAmount', 'shippingAmount', 'totalAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $supplier = $purchase->supplier;
        $suppliers = Supplier::all();
        return view('purchases.edit-purchase', compact('purchase', 'supplier', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $data = $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'paid_amount' => 'required',
            'note' => 'required',
        ]);

        $purchase->update($data);

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
    }
}
