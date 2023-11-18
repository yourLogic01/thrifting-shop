<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OrganizeDataTable;

class OrganizeStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrganizeDataTable $dataTable)
    {
        return $dataTable->render('organize-stock.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organize-stock.create-stock');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
