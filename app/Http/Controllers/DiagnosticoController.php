<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticoRequest;
use App\Models\diagnostico;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $parque_id = $request->input('parque_id');
        $tipo_recurso = $request->input('tipo_recurso');
        $estado = $request->input('estado');
        $parques = Parque::all();
        $diagnosticos = Diagnostico::query()
            ->where('id_parque', $parque_id)
            ->orderBy('tipoRecurso');

        if($tipo_recurso){
            $diagnosticos = $diagnosticos->where('tipoRecurso', $tipo_recurso);
        }

        if($estado){
            $diagnosticos = $diagnosticos->where('estado', $estado);
        }

        $diagnosticos = $diagnosticos->get();
        return view('pages.diagnosticos.index', compact(
            'parque_id',
            'tipo_recurso',
            'parques',
            'estado',
            'diagnosticos'
        ));
    }

    public function validar(Request $request)
    {
        $parque = $request->parque;
        $id = $request->id;
        $tabla = $request->tabla;
        $registro = Diagnostico::query()
            ->where('tipoRecurso', '=', $tabla)
            ->where('id_parque', '=', $parque)
            ->where('id_recurso', '=', $id)
            ->first();

        if ($registro) {
            return redirect()->route('diagnostico.edit', $registro->id);
        } else {
            return redirect()->route('diagnostico.create', ['idParque' => $parque, 'id' => $id, 'tabla' => $tabla]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idParque, $id, $tabla)
    {
        $parque = Parque::findOrFail($idParque);
        return view('pages.inventario.diagnostico.create', compact('id', 'tabla', 'parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosticoRequest $request, $idParque, $id, $tabla)
    {
        //

        $data = $request->validated();
        $data['id_parque'] = $idParque;
        $data['id_recurso'] = $id;
        $data['tipoRecurso'] = $tabla;
        Diagnostico::create($data);
        return redirect()->route('inventario.busqueda', $idParque);
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
    public function edit(Diagnostico $diagnostico, Parque $parque)
    {
        //
        return view('pages.inventario.diagnostico.edit', compact('diagnostico', 'parque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(DiagnosticoRequest $request, diagnostico $diagnostico)
    {
        //
        $data = $request->validated();
        $diagnostico->update($data);
        return redirect('inventario');
    }

    public function informe(Parque $parque)
    {
        $diagnosticos = Diagnostico::where('id_parque', $parque->id)->get();
        return view('pages.informes.diagnostico', compact('diagnosticos'));

    }
}
