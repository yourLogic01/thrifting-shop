<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('products.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Categories::query()->create([
            'category_name' => $request->category_name,
        ]);

        return response()->redirectToRoute('product-categories.index')->with('success', 'Categories created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Categories::findOrFail($id);
        return view('products.categories.edit-category', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'category_name' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $category = Categories::findOrFail($id);
            $category->category_name = $request->category_name;
            $category->save();

            DB::commit();

            return response()->redirectToRoute('product-categories.index')->with('success', 'Categories updated successfully');
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
            $category = Categories::findOrFail($id);
            $category->delete();

            DB::commit();
            return response()->redirectToRoute('product-categories.index')->with('success', 'Categories deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
