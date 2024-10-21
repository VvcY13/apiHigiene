<?php

namespace App\Http\Controllers;

use App\Models\AlmacenMaquina;
use App\Models\AlmacenStock;
use Illuminate\Http\Request;

class AlmacenMaquinaController extends Controller
{
    public function index()
    {
        return response()->json(AlmacenMaquina::with('insumo')->get());
    }

    public function traspasar(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'insumo_id' => 'required|exists:insumos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Verificar que haya suficiente cantidad en el almacén de stock
        $almacenStock = AlmacenStock::where('insumo_id', $request->insumo_id)->first();

        // Verificar que exista el almacenStock y que tenga suficiente cantidad
        if (!$almacenStock || $almacenStock->cantidad < $request->cantidad) {
            return response()->json(['message' => 'No hay suficiente cantidad disponible. Solo hay ' . ($almacenStock ? $almacenStock->cantidad : 0) . '.'], 400);
        }

        // Realizar el traspaso
        $almacenMaquina = AlmacenMaquina::firstOrNew(['insumo_id' => $request->insumo_id]);
        $almacenMaquina->cantidad += $request->cantidad;
        $almacenMaquina->save();

        // Disminuir la cantidad en el almacén de stock
        $almacenStock->cantidad -= $request->cantidad;
        $almacenStock->save();

        return response()->json([
            'message' => 'Insumo transferido a la máquina con éxito.',
            'almacenMaquina' => $almacenMaquina,
        ]);
    }
}
