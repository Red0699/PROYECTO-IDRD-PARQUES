<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nombre',
        'correo',
        'mensaje',
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
