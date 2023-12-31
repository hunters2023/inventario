<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha', 'numero', 'area', 'solicitante', 'codigo', 'infraestructura', 'mobiliaria',
        'detallar_parte', 'cantidad', 'descripcion', 'firma_del_responsable', 'autorizado_por',
        'grave', 'leve', 'critica','equipos_maquinarias',
    ];
}
