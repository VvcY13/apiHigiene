<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlmacenMaquina extends Model
{
    protected $table = 'almacen_maquina';
    protected $fillable = ['insumo_id', 'cantidad'];

    public function insumo()
    {
        return $this->belongsTo(Insumos::class);
    }
}
