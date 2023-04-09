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

    public function equipamiento(){
        return $this->hasMany('App\Models\equipamiento');
    }
    
    public function mobiliario(){
        return $this->hasMany('App\Models\mobiliario');
    }

    public function escenario(){
        return $this->hasMany('App\Models\escenario');   
    }

    public function diagnostico(){
        return $this->hasMany('App\Models\diagnostico');   
    }
    
}
