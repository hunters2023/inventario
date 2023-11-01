<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Switches extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'marca',
        'modelo',
        'tamaño',
        'numero_serie',
        'codigo_inventario',
        'numero_puerto',
        'fibra_canal',
        'estado'
    ];
}
