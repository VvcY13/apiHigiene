<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
    use HasFactory;
    protected $table = 'almacenes'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nomAlmacen', 
        'referencia'
    ];

    public function almacenStocks()
    {
        return $this->hasMany(AlmacenStocks::class, 'id_almacen');
    }

    public function almacenMaquinas()
    {
        return $this->hasMany(AlmacenMaquinas::class, 'id_almacen');
    }
}
