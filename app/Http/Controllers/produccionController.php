<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduccionRequest;
use App\Models\Produccion;
use Illuminate\Http\Request;

class produccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produccion = Produccion::all();
        return response()->json($produccion);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProduccionRequest $request)
    {
        $produccion = Produccion::create($request->validated());
        return response()->json($produccion, 201);
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
        $produccion = Produccion::findOrFail($id);
        return response()->json($produccion);
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
    public function update(ProduccionRequest $request, $id)
    {
        $produccion = Produccion::findOrFail($id);
        $produccion->update($request->validated());
        return response()->json($produccion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);
        $produccion->delete();
        return response()->json(['message' => 'Produccion eliminado con éxito.']);
    }
}
