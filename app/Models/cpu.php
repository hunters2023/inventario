<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cpu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'marca',
        'modelo',
        'numero_serie',
        'codigo_inventario',
        'procesador',
        'disco_duro',
        'memoria_ram',
        'tarjeta_inalambrica',
        'tarjeta_video',
        'sistema_operativo',
        'estado'
    ];
}
