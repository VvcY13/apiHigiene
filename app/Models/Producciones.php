<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producciones extends Model
{
    use HasFactory;

    protected $table = 'producciones';

    protected $fillable = []; // Puedes agregar más campos si es necesario

    public function insumos()
    {
        return $this->hasMany(ProduccionesInsumos::class, 'produccion_id'); // Asegúrate de que aquí se usa 'produccion_id'
    }
}
