<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenesRequest;
use App\Models\Almacenes;
use Illuminate\Http\Request;

class almacenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacenes = Almacenes::all();
        return response()->json($almacenes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AlmacenesRequest $request)
    {
        $almacenes = Almacenes::create($request->validated());
        return response()->json($almacenes, 201);
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
        $almacenes = Almacenes::findOrFail($id);
        return response()->json($almacenes);
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
    public function update(AlmacenesRequest $request, $id)
    {
        $almacenes = Almacenes::findOrFail($id);
        $almacenes->update($request->validated());
        return response()->json($almacenes);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $almacenes = Almacenes::findOrFail($id);
        $almacenes->delete();
        return response()->json(['message' => 'eliminado con éxito.']);
    }
}
