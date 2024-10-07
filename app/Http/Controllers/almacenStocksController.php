<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenStockRequest;
use App\Models\AlmacenStocks;
use Illuminate\Http\Request;

class almacenStocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacenStocks = AlmacenStocks::all();
        return response()->json($almacenStocks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AlmacenStockRequest $request)
    {
        $almacenStock = AlmacenStocks::create($request->validated());
        return response()->json($almacenStock, 201);
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
    public function show($id)
    {
        $almacenStock = AlmacenStocks::findOrFail($id);
        return response()->json($almacenStock);
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
    public function update(AlmacenStockRequest $request, $id)
    {
        $almacenStock = AlmacenStocks::findOrFail($id);
        $almacenStock->update($request->validated());
        return response()->json($almacenStock);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $almacenStock = AlmacenStocks::findOrFail($id);
        $almacenStock->delete();
        return response()->json(['message' => 'eliminado con éxito.']);
    }
}
