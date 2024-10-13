<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre'
    ];

     // Relación con salidas a través de la tabla pivote 'salida_producto'
     public function salidas()
     {
         return $this->belongsToMany(Salidas::class, 'salida_producto', 'id_producto', 'salida_id')
                     ->withPivot('id_medida', 'cantidad');
     }
 
     // Relación para obtener la medida a través de la tabla pivote
     public function medida()
     {
         return $this->belongsTo(Medidas::class, 'pivot.id_medida', 'id');
     }

}
