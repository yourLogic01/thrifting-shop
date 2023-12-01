<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_code' => 'required|unique:categories,category_code',
            'category_name' => 'required',
        ]);
        $categoryCode = strtoupper($request->category_code);

        Category::query()->create([
            'category_code' => $categoryCode,
            'category_name' => $request->category_name,
        ]);
        toast("Category Created Successfully", 'success');

        return response()->redirectToRoute('product-categories.index')->with('success', 'Categories created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('products.categories.edit-category', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_code' => 'required|unique:categories,category_code,' . $id,
            'category_name' => 'required',
        ]);
        $categoryCode = strtoupper($request->category_code);

        try {
            DB::beginTransaction();

            Category::findOrFail($id)->update([
                'category_code' => $categoryCode,
                'category_name' => $request->category_name,
            ]);

            DB::commit();
            toast("Category Updated Successfully", 'success');
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
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $category = Category::findOrFail($id);
            $category->delete();

            DB::commit();
            toast("Category Deleted Successfully", 'warning');
            return response()->redirectToRoute('product-categories.index')->with('success', 'Categories deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
