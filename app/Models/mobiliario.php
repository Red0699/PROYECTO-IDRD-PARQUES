<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobiliario extends Model
{
    use HasFactory;
    protected $fillable = [
        'idparque',
        'tipomobiliario',
        'material',
        'longitud',
        'estado',
        'ubicacion'
    ];
    public function parque(){
        return $this->belongsTo('App\Models\Parque');
    
}
}