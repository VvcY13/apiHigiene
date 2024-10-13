<?php

namespace App\Http\Controllers;

use App\Models\Salidas;
use App\Models\StockGeneral;
use Illuminate\Http\Request;

class salidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Cargar salidas con productos y medidas
        $salidas = Salidas::with('productosConMedida')->get();
        return response()->json($salidas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        // Cargar la salida específica con productos y medidas
        $salida = Salidas::with('productosConMedida')->findOrFail($id);
        return response()->json($salida);
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
    public function update(Request $request, string $id)
    {
        // Aquí puedes implementar la lógica para actualizar una salida si es necesario.
        // Por ejemplo, podrías querer actualizar solo algunos campos de la salida.
        // A continuación hay un ejemplo básico:
        $validatedData = $request->validate([
            'numero_guia' => 'sometimes|required|unique:salidas,numero_guia,' . $id,
        ]);

        $salida = Salidas::findOrFail($id);
        $salida->update($validatedData);

        return response()->json(['message' => 'Salida actualizada exitosamente.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salida = Salidas::findOrFail($id);
        $salida->delete();
        return response()->json(['message' => 'Salida eliminada exitosamente.'], 200);
    }
    public function registrarSalida(Request $request)
{
    try {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'numero_guia' => 'required|unique:salidas,numero_guia',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|exists:productos,id',
            'productos.*.id_medida' => 'required|exists:medidas,id',
            'productos.*.cantidad' => 'required|integer|min:1'
        ]);

        // Crear la salida
        $salida = Salidas::create([
            'numero_guia' => $validatedData['numero_guia'],
        ]);

        // Registrar los productos despachados y actualizar el stock
        foreach ($validatedData['productos'] as $producto) {
            // Resta el stock del producto en stock_general
            $stockGeneral = StockGeneral::where('id_producto', $producto['id_producto'])
                                        ->where('id_medida', $producto['id_medida'])
                                        ->first();

            if ($stockGeneral && $stockGeneral->stock_total >= $producto['cantidad']) {
                // Descontar del stock
                $stockGeneral->stock_total -= $producto['cantidad'];
                $stockGeneral->save();

                // Asociar producto a la salida
                $salida->productos()->attach($producto['id_producto'], [
                    'id_medida' => $producto['id_medida'],
                    'cantidad' => $producto['cantidad'],
                    'salida_id' => $salida->id // Asegúrate de incluir esto
                ]);
            } else {
                return response()->json(['message' => 'Stock insuficiente para el producto: ' . $producto['id_producto']], 400);
            }
        }

        return response()->json(['message' => 'Salida registrada exitosamente.'], 201);

    } catch (\Exception $e) {
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
}
}
