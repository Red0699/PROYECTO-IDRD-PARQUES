<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancha_deportiva extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_parque',
    'tipocancha',
    'ancho',
    'largo',
    'area',
    'material',
    'iluminacion',
    'cerramiento',
    'camerino',
    'descripcion',
    'estado'
    ];
    public function parque(){
        return $this->belongsTo('App\Models\Parque');
}
}