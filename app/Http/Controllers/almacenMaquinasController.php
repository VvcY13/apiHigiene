<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlmacenMaquinasRequest;
use App\Models\AlmacenMaquinas;
use Illuminate\Http\Request;

class almacenMaquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacenMAquinas = AlmacenMaquinas::all();
        return response()->json($almacenMAquinas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AlmacenMaquinasRequest $request)
    {
        $almacenMaquina = AlmacenMaquinas::create($request->validated());
        return response()->json($almacenMaquina, 201);
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
        $almacenMaquina = AlmacenMaquinas::findOrFail($id);
        return response()->json($almacenMaquina);
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
    public function update(AlmacenMaquinasRequest $request, $id)
    {
        $almacenMaquina = AlmacenMaquinas::findOrFail($id);
        $almacenMaquina->update($request->validated());
        return response()->json($almacenMaquina);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $almacenMaquina = AlmacenMaquinas::findOrFail($id);
        $almacenMaquina->delete();
        return response()->json(['message' => 'eliminado con éxito.']);
    }
}
