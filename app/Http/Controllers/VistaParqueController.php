<?php

namespace App\Http\Controllers;

use App\Models\Parque;
use Illuminate\Http\Request;

class VistaParqueController extends Controller
{
    //

    public function index(Request $request){
        $localidad = $request->input('localidad');
        $escala = $request->input('escala');
        $parques = Parque::query();

        if($localidad){
            $parques = $parques->where('localidad', $localidad);
        }
        if($escala){
            $parques = $parques->where('escala', $escala);
        }

        $parques = $parques->get();
        return view('pages\parques\home\view', compact(
            'parques',
            'localidad',
            'escala'
        ));
    }

    public function show(Parque $parque){
        return view('pages\parques\home\show', compact('parque'));
    }
}
