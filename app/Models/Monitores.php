<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitores extends Model
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
        'color',
        'estado'
    ];

}
