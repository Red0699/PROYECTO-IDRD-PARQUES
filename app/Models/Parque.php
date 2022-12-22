<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parque extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreParque',
        'localidad',
        'area',
        'escala',
        'estrato',
        'direccion',
        'foto'
    ];

    public function juego(){
        return $this->hasMany('App\Models\Juegos');
    }

    public function cancha(){
        return $this->hasMany('App\Models\cancha_deportiva');
    }
}
