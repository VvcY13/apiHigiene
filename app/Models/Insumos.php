<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    use HasFactory;
    protected $table = 'insumos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre', 
        'diametro_standar', 
        'kilos_standar'
    ];

    public function almacenStocks()
    {
        return $this->hasMany(AlmacenStocks::class, 'id_insumo');
    }

    public function almacenMaquinas()
    {
        return $this->hasMany(AlmacenMaquinas::class, 'id_insumo');
    }

    public function produccions()
    {
        return $this->hasMany(Produccion::class, 'id_insumo');
    }
}
