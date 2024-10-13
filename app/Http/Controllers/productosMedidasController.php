<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductosMedidasRequest;
use App\Models\ProductosMedidas;
use App\Models\StockGeneral;
use Illuminate\Http\Request;

class productosMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productosMedidas = ProductosMedidas::with(['producto', 'medida'])->get();
        return response()->json($productosMedidas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductosMedidasRequest $request)
    {
        $productoMedida = ProductosMedidas::create($request->validated());

        $this->actualizarStockGeneral($request->id_producto, $request->id_medida, $request->cantidad_unitaria);

        return response()->json($productoMedida, 201);
    }
    protected function actualizarStockGeneral($id_producto, $id_medida, $cantidad_producida)
    {
        // Buscar si ya existe un registro de stock para ese producto y medida
        $stockGeneral = StockGeneral::where('id_producto', $id_producto)
                                    ->where('id_medida', $id_medida)
                                    ->first();

        if ($stockGeneral) {
            // Si ya existe el registro, sumamos la cantidad producida al stock existente
            $stockGeneral->stock_total += $cantidad_producida;
            $stockGeneral->save();
        } else {
            // Si no existe, creamos un nuevo registro en stock_general
            StockGeneral::create([
                'id_producto' => $id_producto,
                'id_medida' => $id_medida,
                'stock_total' => $cantidad_producida
            ]);
        }
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
        $productoMedida = ProductosMedidas::with(['producto', 'medida'])->findOrFail($id);
        return response()->json($productoMedida);
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
    public function update(ProductosMedidasRequest $request, $id)
    {
        $productoMedida = ProductosMedidas::findOrFail($id);
        $productoMedida->update($request->validated());
        return response()->json($productoMedida);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productoMedida = ProductosMedidas::findOrFail($id);
        $productoMedida->delete();
        return response()->json(['message' => 'Producto-Medida eliminada con éxito.']);
    }
}
