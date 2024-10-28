<?php

namespace App\Http\Controllers;

use App\Models\AlmacenMaquina;
use App\Models\AlmacenStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    DB::transaction(function () use ($request) {
        // Verificar que haya suficiente cantidad en el almacén de stock
        $almacenStock = AlmacenStock::where('insumo_id', $request->insumo_id)->first();

        if (!$almacenStock || $almacenStock->cantidad < $request->cantidad) {
            throw new \Exception('No hay suficiente cantidad disponible. Solo hay ' . ($almacenStock ? $almacenStock->cantidad : 0) . '.');
        }

        // Realizar el traspaso a la máquina
        $almacenMaquina = AlmacenMaquina::firstOrNew(['insumo_id' => $request->insumo_id]);
        $almacenMaquina->cantidad += $request->cantidad;
        $almacenMaquina->save();

        // Disminuir la cantidad en el almacén de stock
        $almacenStock->cantidad -= $request->cantidad;
        $almacenStock->save();
    });

    return response()->json([
        'message' => 'Insumo transferido a la máquina con éxito.',
        'almacenMaquina' => AlmacenMaquina::where('insumo_id', $request->insumo_id)->first(),
    ]);
    }
}
