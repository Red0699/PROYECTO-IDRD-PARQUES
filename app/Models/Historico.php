<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        "nombreHistorico",
        "id_usuario",
        "id_record",
        "tabla",
        "accion",
        "campos",
        "resultado",
        "descripcion",
        //"fechaCreacion",
        //"fechaActualizacion"
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
