<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use App\Models\Rating;
use Illuminate\Http\Request;

class VistaParqueController extends Controller
{
    //

    public function index(Request $request)
    {

        $localidad = $request->input('localidad');
        $escala = $request->input('escala');
        $parques = Parque::query();

        if ($localidad) {
            $parques = $parques->where('localidad', $localidad);
        }
        if ($escala) {
            $parques = $parques->where('escala', $escala);
        }

        $parques = $parques->get();
        return view('pages.parques.home.view', compact(
            'parques',
            'localidad',
            'escala'
        ));
    }

    public function show(Parque $parque)
    {
        $registro = Rating::where('id_user', auth()->user()->id)
          ->where('id_parque', $parque->id)->first();
            
    return view('pages.parques.home.show', compact('parque', 'registro'));
    }
}
