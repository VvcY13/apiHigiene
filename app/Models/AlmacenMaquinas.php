<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenMaquinas extends Model
{
    use HasFactory;
    protected $table = 'almacen_maquinas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_almacen', 
        'id_insumo', 
        'cantidad', 
        'unidad_medida', 
        'diametro_cm', 
        'diametro_metros', 
        'cantidad_kilos', 
        'cantidad_gramos'
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacenes::class, 'id_almacen');
    }

    public function insumo()
    {
        return $this->belongsTo(Insumos::class, 'id_insumo');
    }
}
