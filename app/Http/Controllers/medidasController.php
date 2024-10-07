<?php

namespace App\Http\Controllers;

use App\Http\Requests\medidasRequest;
use App\Models\Medidas;
use Illuminate\Http\Request;

class medidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medidas = Medidas::all();
        return response()->json($medidas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(medidasRequest $request)
    {
        $medida = Medidas::create($request->validated());
        return response()->json($medida, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(medidasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medida = Medidas::findOrFail($id);
        return response()->json($medida);
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
    public function update(medidasRequest $request, $id)
    {
        $medida = Medidas::findOrFail($id);
        $medida->update($request->validated());
        return response()->json($medida);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $medida = Medidas::findOrFail($id);
        $medida->delete();
        return response()->json(['message' => 'Medida eliminada con éxito.']);
    }
}
