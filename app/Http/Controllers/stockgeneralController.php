<?php

namespace App\Http\Controllers;

use App\Models\StockGeneral;
use Illuminate\Http\Request;

class stockgeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockGeneral = StockGeneral::with(['producto', 'medida'])->get();
        return response()->json($stockGeneral);
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
        $stockGeneral = StockGeneral::with(['producto', 'medida'])->findOrFail($id);
        return response()->json($stockGeneral);
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
        $validatedData = $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'id_medida' => 'required|exists:medidas,id',
            'stock_total' => 'required|numeric|min:0'
        ]);

        // Buscamos el stock a actualizar
        $stockGeneral = StockGeneral::findOrFail($id);
        $stockGeneral->update($validatedData);

        return response()->json(['message' => 'Stock actualizado exitosamente.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stockGeneral = StockGeneral::findOrFail($id);
        $stockGeneral->delete();
        return response()->json(['message' => 'Stock eliminado exitosamente.'], 200);
    }
    public function restarStock(Request $request)
    {
        // Validamos los datos de la solicitud
        $validatedData = $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'id_medida' => 'required|exists:medidas,id',
            'cantidad' => 'required|numeric|min:0'
        ]);

        // Buscamos el registro en stock_general
        $stockGeneral = StockGeneral::where('id_producto', $validatedData['id_producto'])
                                    ->where('id_medida', $validatedData['id_medida'])
                                    ->first();

        if ($stockGeneral) {
            // Verificamos si hay suficiente stock para descontar
            if ($stockGeneral->stock_total >= $validatedData['cantidad']) {
                $stockGeneral->stock_total -= $validatedData['cantidad'];
                $stockGeneral->save();
                return response()->json(['message' => 'Stock restado exitosamente.'], 200);
            } else {
                // Si no hay suficiente stock, devolvemos un error
                return response()->json(['message' => 'Stock insuficiente para esta operación.'], 400);
            }
        } else {
            return response()->json(['message' => 'No hay stock registrado para este producto y medida.'], 404);
        }
    }
    public function agregarStock(Request $request)
    {
         // Validamos los datos de la solicitud
         $validatedData = $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'id_medida' => 'required|exists:medidas,id',
            'cantidad' => 'required|numeric|min:0'
        ]);

        // Buscamos si ya existe el stock del producto por medida
        $stockGeneral = StockGeneral::where('id_producto', $validatedData['id_producto'])
                                    ->where('id_medida', $validatedData['id_medida'])
                                    ->first();

        if ($stockGeneral) {
            // Si existe, sumamos la cantidad al stock existente
            $stockGeneral->stock_total += $validatedData['cantidad'];
            $stockGeneral->save();
        } else {
            // Si no existe, creamos un nuevo registro con la cantidad inicial
            StockGeneral::create([
                'id_producto' => $validatedData['id_producto'],
                'id_medida' => $validatedData['id_medida'],
                'stock_total' => $validatedData['cantidad']
            ]);
        }

        return response()->json(['message' => 'Stock agregado exitosamente.'], 200);
    }
}
