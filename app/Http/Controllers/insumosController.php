<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsumosRequest;
use App\Models\Insumos;
use Illuminate\Http\Request;

class insumosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insumos = Insumos::all();
        return response()->json($insumos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(InsumosRequest $request)
    {
        $insumos = Insumos::create($request->validated());
        return response()->json($insumos, 201);
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
        $insumos = Insumos::findOrFail($id);
        return response()->json($insumos);
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
    public function update(InsumosRequest $request, $id)
    {
        $insumos = Insumos::findOrFail($id);
        $insumos->update($request->validated());
        return response()->json($insumos);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $insumos = Insumos::findOrFail($id);
        $insumos->delete();
        return response()->json(['message' => 'insumo eliminado con éxito.']);
    }
}
