<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('products.create-product', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => ['required', 'unique:products'],
            'product_name' => ['required', 'unique:products'],
            'categories_id' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'alert_qty' => ['required'],
            'note' => [],
        ]);

        Products::query()->create([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'categories_id' => $request->categories_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'alert_qty' => $request->alert_qty,
            'note' => $request->note,
        ]);

        return response()->redirectToRoute('product.create')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show-product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        return view('products.edit-product', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_code' => ['required'],
            'product_name' => ['required'],
            'categories_id' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'alert_qty' => ['required'],
            'note' => [],
        ]);
        try {
            DB::beginTransaction();
            $products = Products::findOrFail($id);
            $products->product_code = $request->product_code;
            $products->product_name = $request->product_name;
            $products->categories_id = $request->categories_id;
            $products->price = $request->price;
            $products->qty = $request->qty;
            $products->alert_qty = $request->alert_qty;
            $products->note = $request->note;
            $products->save();

            DB::commit();

            return response()->redirectToRoute('product.index')->with('success', 'Product updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $products = Products::findOrFail($id);
            $products->delete();

            DB::commit();
            return response()->redirectToRoute('product.index')->with('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
