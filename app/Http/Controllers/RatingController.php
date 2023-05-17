<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Parque $parque)
    {
        //
        $data = $request->validate([
            'rating' => 'required',
            'comentario' => 'max:500'
        ], [
            'rating.required' => 'Debe seleccionar una opción',
            'comentario' => 'El texto no debe sobrepasar de 500 caracteres'
        ]);

        $data['id_parque'] = $parque->id;
        $data['id_user'] = auth()->user()->id;

        $rating = Rating::create($data);
        return redirect()->route('vista.show', $parque->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating, Parque $parque)
    {
        //
        $data = $request->validate([
            'rating' => 'required',
            'comentario' => 'max:500'
        ], [
            'rating.required' => 'Debe seleccionar una opción',
            'comentario' => 'El texto no debe sobrepasar de 500 caracteres'
        ]);

        $rating->update($data);

        return redirect()->route('vista.show', $parque->id);
    }
}
