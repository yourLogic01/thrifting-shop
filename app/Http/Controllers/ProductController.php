<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\Product;
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
        $categories = Category::all();

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
            'category_id' => ['required'],
            'product_code' => ['required', 'string', 'unique:products,product_code'],
            'product_name' => ['required', 'string'],
            'price' => ['required'],
            'qty' => ['required', 'min:1'],
            'alert_qty' => ['required', 'min:0'],
            'note' => ['nullable', 'max:1000'],
        ]);

        Product::query()->create([
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'qty' => $request->qty,
            'alert_qty' => $request->alert_qty,
            'note' => $request->note,
        ]);

        return response()->redirectToRoute('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show-product', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit-product', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_id' => ['required'],
            'product_code' => ['required', 'string', 'unique:products,product_code,' . $id],
            'product_name' => ['required', 'string'],
            'price' => ['required'],
            'qty' => ['required', 'min:1'],
            'alert_qty' => ['required', 'min:0'],
            'note' => ['nullable', 'max:1000'],
        ]);

        try {
            DB::beginTransaction();

            $products = Product::findOrFail($id);

            $products->category_id = $request->category_id;
            $products->product_code = $request->product_code;
            $products->product_name = $request->product_name;
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
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $products = Product::findOrFail($id);
            $products->delete();

            DB::commit();
            return response()->redirectToRoute('product.index')->with('success', 'Product deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
