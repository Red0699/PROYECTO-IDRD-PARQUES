<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
        'id_parque',
        'id_user',
        'rating',
        'comentario'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parque()
    {
        return $this->belongsTo(Parque::class);
    }
    use HasFactory;
}
