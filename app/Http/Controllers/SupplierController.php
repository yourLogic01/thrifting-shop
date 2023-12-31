<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SupplierDataTable $dataTable)
    {
        return $dataTable->render('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create-supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'supplier_name' => 'required',
            'supplier_email' => 'required|email',
            'supplier_phone' => 'required',
            'address' => 'required',
        ]);

        // Save the supplier to the database
        Supplier::create($data);
        toast("Suplier Created Successfully", 'success');

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.show-supplier', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit-supplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->validate([
            'supplier_name' => 'required',
            'supplier_email' => 'required|email',
            'supplier_phone' => 'required',
            'address' => 'required',
        ]);

        $supplier->update($data);
        toast("Suplier Updated Successfully", 'success');

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {

        if ($supplier->purchases()->exists()) {
            return back()->withErrors('Can\'t delete because there are purchases associated with this supplier!');
        }

        $supplier->delete();

        toast("Suplier Deleted Successfully", 'warning');

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
