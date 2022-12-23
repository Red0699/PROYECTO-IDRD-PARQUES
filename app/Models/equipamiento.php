<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'idparque',
        'modulo',
        'largo',
        'ancho',
        'area',
        'luz',
        'agua',
        'gas',
        'descripcion',
        'estado'
    ];
    public function parque(){
        return $this->belongsTo('App\Models\Parque');
}
}