<?php

namespace App\Http\Controllers;

use App\Models\AlmacenStock;
use Illuminate\Http\Request;

class AlmacenStockController extends Controller
{
    public function index()
    {
        return response()->json(AlmacenStock::with('insumo')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'insumo_id' => 'required|exists:insumos,id',
            'cantidad' => 'required|integer|min:1', // Cambiado a min:1
        ]);

        $almacenStock = AlmacenStock::firstOrNew(['insumo_id' => $request->insumo_id]);
        $almacenStock->cantidad += $request->cantidad;
        $almacenStock->save();

        return response()->json([
            'message' => 'Insumo agregado al almacén de stock.',
            'almacenStock' => $almacenStock,
        ]);
    }
    public function getCantidadDisponible($insumoId)
{
    // Suponiendo que tienes un modelo AlmacenStock
    $almacenStock = AlmacenStock::where('insumo_id', $insumoId)->first();

    if ($almacenStock) {
        return response()->json(['cantidad' => $almacenStock->cantidad]);
    }

    return response()->json(['cantidad' => 0]); // O maneja un error
}
}
