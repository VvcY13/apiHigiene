<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlmacenStock extends Model
{
    protected $table = 'almacen_stock';
    protected $fillable = ['insumo_id', 'cantidad'];

   

    public function insumo()
    {
        return $this->belongsTo(Insumos::class);
    }
}
