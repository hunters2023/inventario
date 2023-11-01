<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Ubicacion;

class areas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 
        'ubicacion', 
        'capacidad_maxima',
         'encargado_de_area'
        ];

        public function ubicaciones()
{
    return $this->hasMany(Ubicacion::class);
}

}
