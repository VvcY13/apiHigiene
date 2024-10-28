<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduccionesInsumos extends Model
{
    protected $table = 'produccion_insumos'; // Asegúrate de que este sea el nombre correcto
    protected $fillable = ['produccion_id', 'insumo_id', 'inicial', 'final', 'tipo_medida'];

    public function produccion()
    {
        return $this->belongsTo(Producciones::class, 'produccion_id'); // Asegúrate de que este nombre sea correcto
    }

    public function insumo()
    {
        return $this->belongsTo(Insumos::class);
    }
}
