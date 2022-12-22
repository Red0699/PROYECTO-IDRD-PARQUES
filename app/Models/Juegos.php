<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    use HasFactory;

    protected $fillable = [
        'idParque',
        'tipojuego',
        'iluminacion',
        'material',
        'altura',
        'cerramiento',
        'reservable',
        'largo',
        'ancho',
        'area',
        'materialsuperficie',
        'descripcion',
        'estado'
    ];

    public function parque(){
        return $this->belongsTo('App\Models\Parque');
    }
}
