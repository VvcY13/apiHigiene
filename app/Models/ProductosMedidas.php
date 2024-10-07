<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosMedidas extends Model
{
    use HasFactory;
    protected $table = 'productos_medidas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_producto', 
        'id_medida', 
        'cantidad_unitaria'
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }

    public function medida()
    {
        return $this->belongsTo(Medidas::class, 'id_medida');
    }
}
