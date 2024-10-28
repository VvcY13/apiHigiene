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
    public function almacenStock()
    {
        return $this->hasOne(AlmacenStock::class);
    }

    public function almacenMaquina()
    {
        return $this->hasOne(AlmacenMaquina::class);
    }
    public function producciones()
    {
        return $this->belongsToMany(Producciones::class, 'insumo_produccion'); // Relación many-to-many
    }
   
}
