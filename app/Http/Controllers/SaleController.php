<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SalesDataTable;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SalesDataTable $dataTable)
    {
        return $dataTable->render('sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.create-sale');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('sales.show-sale');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('sales.edit-sale');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
