<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_guia'
    ];

   // Relación con productos a través de la tabla pivote 'salida_producto'
   public function productos()
    {
        return $this->belongsToMany(Productos::class, 'salida_producto', 'salida_id', 'id_producto')
                    ->withPivot('id_medida', 'cantidad')
                    ->with(['medidas']);
    }

    // Relación personalizada para unir productos con medidas a través de la tabla pivote
    public function productosConMedida()
    {
        return $this->belongsToMany(Productos::class, 'salida_producto', 'salida_id', 'id_producto')
                    ->withPivot('id_medida', 'cantidad')
                    ->join('medidas', 'medidas.id', '=', 'salida_producto.id_medida') // Unir con la tabla de medidas
                    ->select('productos.*', 'salida_producto.*', 'medidas.nombreMedida as medida_nombre'); // Seleccionar nombreMedida
    }
}
