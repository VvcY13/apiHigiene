<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;
    protected $table = 'produccions'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id_insumo', 
        'cantidad_producida', 
        'diametro_inicial', 
        'diametro_final'
    ];

    public function insumo()
    {
        return $this->belongsTo(Insumos::class, 'id_insumo');
    }
}
