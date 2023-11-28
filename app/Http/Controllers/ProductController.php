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
            'product_quantity' => ['required', 'min:1'],
            'product_cost' => ['required', 'string'],
            'product_price' => ['required', 'string'],
            'alert_quantity' => ['required', 'min:0'],
            'product_note' => ['nullable', 'max:1000'],
        ]);

        $productCode = strtoupper($request->product_code);
        Product::query()->create([
            'category_id' => $request->category_id,
            'product_code' => $productCode,
            'product_name' => $request->product_name,
            'product_quantity' => $request->product_quantity,
            'product_cost' => $request->product_cost,
            'product_price' => $request->product_price,
            'alert_quantity' => $request->alert_quantity,
            'product_note' => $request->product_note,
        ]);

        return response()->redirectToRoute('product.index');
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
            'product_quantity' => ['required', 'min:1'],
            'product_cost' => ['required', 'string'],
            'product_price' => ['required', 'string'],
            'alert_quantity' => ['required', 'min:0'],
            'product_note' => ['nullable', 'max:1000'],
        ]);
        $productCode = strtoupper($request->product_code);

        try {
            DB::beginTransaction();

            $products = Product::findOrFail($id);

            $products->category_id = $request->category_id;
            $products->product_code = $productCode;
            $products->product_name = $request->product_name;
            $products->product_quantity = $request->product_quantity;
            $products->product_cost = $request->product_cost;
            $products->product_price = $request->product_price;
            $products->alert_quantity = $request->alert_quantity;
            $products->product_note = $request->product_note;

            $products->save();

            DB::commit();

            return response()->redirectToRoute('product.index');
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
            return response()->redirectToRoute('product.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
