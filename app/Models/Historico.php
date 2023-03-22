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
        "tabla",
        "accion",
        "resultado",
        "descripcion",
        
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
