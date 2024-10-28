<?php

namespace App\Http\Controllers;

use App\Models\Producciones;
use Illuminate\Http\Request;

class ProduccionesController extends Controller
{
    // Método para registrar el inicio de la producción
   
    public function obtenerProducciones()
    {
        $producciones = Producciones::with(['insumos.insumo'])->get(); // Asegúrate de que `insumo` es el nombre correcto de la relación

    return response()->json($producciones);
    }
    public function registrarInicio(Request $request)
    {
      // Validar los datos de entrada
    $request->validate([
        'insumos' => 'required|array',
        'insumos.*.insumo_id' => 'required|exists:insumos,id',
        'insumos.*.inicial' => 'required|numeric|min:0',
        'insumos.*.tipo_medida' => 'required|in:mm,kg',
    ]);

    // Crear el registro de producción
    $produccion = Producciones::create();

    // Registrar cada insumo asociado a la producción
    foreach ($request->insumos as $insumo) {
        $produccion->insumos()->create([
            'insumo_id' => $insumo['insumo_id'],
            'inicial' => $insumo['inicial'],
            'final' => 0, // Este valor se actualizará más tarde
            'tipo_medida' => $insumo['tipo_medida'],
        ]);
    }

    return response()->json([
        'message' => 'Producción registrada con éxito.',
        'produccion_id' => $produccion->id,
        'insumos' => $produccion->insumos, // Puedes incluir los insumos registrados
    ]);
    }

    // Método para registrar el fin de la producción
    public function registrarFin(Request $request, $produccion_id)
    {
        // Validar los datos de entrada
        $request->validate([
            'insumos' => 'required|array',
            'insumos.*.final' => 'required|numeric|min:0',
        ]);
    
        // Buscar la producción por ID
        $produccion = Producciones::find($produccion_id);
    
        if (!$produccion) {
            return response()->json(['message' => 'Producción no encontrada.'], 404);
        }
    
        // Actualizar el valor final de cada insumo asociado a la producción
        foreach ($request->insumos as $insumo) {
            $produccionInsumo = $produccion->insumos()->find($insumo['insumo_id']);
            if ($produccionInsumo) {
                $produccionInsumo->final = $insumo['final'];
                $produccionInsumo->save();
            }
        }
    
        return response()->json([
            'message' => 'Producción finalizada con éxito.',
            'produccion' => $produccion,
        ]);
    }
}
