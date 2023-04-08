<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnostico extends Model
{
    protected $fillable = [
        'id_parque',
        'id_recurso',
        'tipoRecurso',
        'descripcion',
        'fecha',
        'estado',
        'observaciones',
        'acciones'
    ];

    public function parque()
    {
        return $this->belongsTo('App\Models\Parque');
    }
    
    use HasFactory;
}
