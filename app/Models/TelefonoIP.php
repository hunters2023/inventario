<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefonoIP extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'marca',
        'modelo',
        'numero_serie',
        'codigo_inventario',
        'mac_address',
        'estado'
    ];
}
