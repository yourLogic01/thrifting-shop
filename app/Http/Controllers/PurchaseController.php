<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\DB;
use App\DataTables\PurchaseDataTable;
use App\Http\Requests\StorePurchaseRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        Cart::instance('purchase')->destroy();

        $suppliers = Supplier::all();
        return view('purchases.create-purchase', [
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            // dd($request);

            $due_amount = $request->sub_total - $request->paid_amount;

            if ($due_amount == $request->sub_total) {
                $payment_status = 'pending';
            } else {
                $payment_status = 'completed';
            }

            $purchase = Purchase::create([
                'supplier_id' => $request->supplier_id,
                'supplier_name' => Supplier::findOrFail($request->supplier_id)->supplier_name,
                'date' => $request->date,
                'sub_total' => $request->sub_total * 100,
                'paid_amount' => $request->paid_amount * 100,
                'due_amount' => $due_amount * 100,
                'discount' => $request->discount,
                'status' => $request->status,
                'payment_status' => $payment_status,
                'payment_method' => $request->payment_method,
                'note' => $request->note,
            ]);

            foreach (Cart::instance('purchase')->content() as $cart_item) {
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'qty' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                    'product_discount_amount' => $cart_item->options->product_discount * 100,
                ]);

                if ($request->status == 'completed') {
                    $product = Product::findOrFail($cart_item->id);

                    $product->update([
                        'qty' => $product->qty + $cart_item->qty
                    ]);
                }
            }

            Cart::instance('purchase')->destroy();
        });

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
