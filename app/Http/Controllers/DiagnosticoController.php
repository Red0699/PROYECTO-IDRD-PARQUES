<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticoRequest;
use App\Models\diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $tabla)
    {
        
        return view('pages\inventario\diagnostico\create', compact('id', 'tabla'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosticoRequest $request, $id, $tabla)
    {
        //
        
        $data = $request->validated();
        if($tabla == "juego"){
            $data['id_juego'] = $id;
        }else if($tabla == "cancha"){
            $data['id_cancha'] = $id;
        }else if($tabla == "equipamiento"){
            $data['id_equipamiento'] = $id;
        }else if($tabla == "mobiliario"){
            $data['id_mobiliario'] = $id;
        }else if($tabla == "escenario"){
            $data['id_escenario'] = $id;
        }
        $data['tipoRecurso'] = $tabla;
        Diagnostico::create($data);
        return redirect()->route('parque.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(diagnostico $diagnostico)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diagnostico $diagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(diagnostico $diagnostico)
    {
        //
    }
}
