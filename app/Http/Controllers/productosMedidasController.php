<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductosMedidasRequest;
use App\Models\ProductosMedidas;
use Illuminate\Http\Request;

class productosMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productosMedidas = ProductosMedidas::with(['producto', 'medida'])->get();
        return response()->json($productosMedidas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductosMedidasRequest $request)
    {
        $productoMedida = ProductosMedidas::create($request->validated());
        return response()->json($productoMedida, 201);
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
        $productoMedida = ProductosMedidas::with(['producto', 'medida'])->findOrFail($id);
        return response()->json($productoMedida);
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
    public function update(ProductosMedidasRequest $request, $id)
    {
        $productoMedida = ProductosMedidas::findOrFail($id);
        $productoMedida->update($request->validated());
        return response()->json($productoMedida);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productoMedida = ProductosMedidas::findOrFail($id);
        $productoMedida->delete();
        return response()->json(['message' => 'Producto-Medida eliminada con éxito.']);
    }
}
