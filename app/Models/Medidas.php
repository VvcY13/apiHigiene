<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas extends Model
{
    use HasFactory;
    protected $table = 'medidas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombreMedida',
        'largo',
        'ancho',
        'cantidad_bolsas',
        'cantidad_bolsones',
    ];
}
