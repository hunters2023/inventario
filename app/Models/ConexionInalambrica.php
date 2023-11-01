<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConexionInalambrica extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'marca',
        'modelo',
        'numero_serie',
        'codigo_inventario',
        'estado'
    ];
}
