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
            $due_amount = $request->paid_amount - $request->total_amount;
            $unpaid = $due_amount - $due_amount * 2;

            if ($unpaid == $request->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount < 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $purchase = Purchase::create([
                'date' => $request->date,
                'supplier_id' => $request->supplier_id,
                'supplier_name' => Supplier::findOrFail($request->supplier_id)->supplier_name,
                'paid_amount' => $request->paid_amount * 100,
                'total_amount' => $request->total_amount * 100,
                'due_amount' => $due_amount * 100,
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
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                ]);

                if ($request->status == 'Completed') {
                    $product = Product::findOrFail($cart_item->id);
                    $product->update([
                        'product_quantity' => $product->product_quantity + $cart_item->qty
                    ]);
                }
            }

            Cart::instance('purchase')->destroy();
        });

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $supplier = Supplier::findOrFail($purchase->supplier_id);

        return view('purchases.show-purchase', compact('purchase', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::all();

        $purchase_details = $purchase->purchaseDetails;

        Cart::instance('purchase')->destroy();

        $cart = Cart::instance('purchase');

        foreach ($purchase_details as $purchase_detail) {
            $cart->add([
                'id'      => $purchase_detail->product_id,
                'name'    => $purchase_detail->product_name,
                'qty'     => $purchase_detail->quantity,
                'price'   => $purchase_detail->price,
                'weight'  => 1,
                'options' => [
                    'sub_total'   => $purchase_detail->sub_total,
                    'code'        => $purchase_detail->product_code,
                    'stock'       => Product::findOrFail($purchase_detail->product_id)->product_quantity,
                    'unit_price'  => $purchase_detail->unit_price
                ]
            ]);
        }

        return view('purchases.edit-purchase', compact('purchase', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        DB::transaction(function () use ($request, $purchase) {
            $due_amount = $request->paid_amount - $request->total_amount;
            $unpaid = $due_amount - $due_amount * 2;

            if ($unpaid == $request->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount < 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            foreach ($purchase->purchaseDetails as $purchase_detail) {
                if ($purchase->status == 'Completed') {
                    $product = Product::findOrFail($purchase_detail->product_id);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $purchase_detail->quantity
                    ]);
                }
                $purchase_detail->delete();
            }

            $purchase->update([
                'date' => $request->date,
                'reference' => $request->reference,
                'supplier_id' => $request->supplier_id,
                'supplier_name' => Supplier::findOrFail($request->supplier_id)->supplier_name,
                'paid_amount' => $request->paid_amount * 100,
                'total_amount' => $request->total_amount * 100,
                'due_amount' => $due_amount * 100,
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
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                ]);

                if ($request->status == 'Completed') {
                    $product = Product::findOrFail($cart_item->id);
                    $product->update([
                        'product_quantity' => $product->product_quantity + $cart_item->qty
                    ]);
                }
            }

            Cart::instance('purchase')->destroy();
        });

        return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index');
    }
}
