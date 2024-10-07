<?php

namespace App\Http\Controllers;

use App\Http\Requests\productosRequest;
use App\Models\Productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::all();
        return response()->json($productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(productosRequest $request)
    {
        $producto = Productos::create($request->validated());
        return response()->json($producto, 201);
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
        $producto = Productos::findOrFail($id);
        return response()->json($producto);
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
    public function update(productosRequest $request, $id)
    {
        $producto = Productos::findOrFail($id);
        $producto->update($request->validated());
        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado con éxito.']);
    }
}
