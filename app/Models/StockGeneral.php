<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockGeneral extends Model
{
    use HasFactory;
    protected $table = 'stock_general'; // Nombre de la tabla

    protected $fillable = [
        'id_producto',
        'id_medida',
        'stock_total'
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }

    public function medida()
    {
        return $this->belongsTo(Medidas::class, 'id_medida');
    }
}
