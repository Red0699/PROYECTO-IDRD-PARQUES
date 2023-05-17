<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escenario extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_parque',
        'tipoescenariodeportivo',
        'largo',
        'ancho',
        'area',
        'luz',
        'agua',
        'gas',
        'cerramiento',
        'camerinos',
        'nbaños',
        'estado',
        'descripcion'
    ];
    public function parque()
    {
        return $this->belongsTo('App\Models\Parque');
    }
}
