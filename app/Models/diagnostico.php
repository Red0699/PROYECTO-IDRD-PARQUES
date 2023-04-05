<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnostico extends Model
{
    protected $fillable = [
        'id_juego',
        'id_cancha',
        'id_escenario',
        'id_mobiliario',
        'id_equipamiento',
        'id_recurso',
        'tipoRecurso',
        'descripcion',
        'fecha',
        'estado',
        'observaciones',
        'acciones'
    ];
    use HasFactory;
}
