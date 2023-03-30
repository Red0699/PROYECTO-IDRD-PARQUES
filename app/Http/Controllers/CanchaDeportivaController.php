<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\cancha_deportiva;
use App\Http\Requests\CanchaRequest;
use Illuminate\Http\Request;
use App\Models\Parque;
use Illuminate\Support\Facades\Gate;

class CanchaDeportivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('inventario_module'), 403);
        $canchas = cancha_deportiva::all();
        return view('pages\inventario\canchas\index', compact('canchas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\canchas\create', compact('parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CanchaRequest $request, Parque $parque)
    {
        $data = $request->validated();
        $data['id_parque'] = $parque->id;
        $cancha = cancha_deportiva::create($data);
        event(new RecursosRecord($cancha, "create", "canchas", "ALL"));
        return redirect()->route('inventario.busqueda', $parque->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function show(cancha_deportiva $cancha_deportiva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function edit(cancha_deportiva $cancha)
    {
        //$parques = Parque::all();
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\canchas\edit', compact('cancha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function update(CanchaRequest $request, cancha_deportiva $cancha)
    {
        $data = $request->validated();
        $cancha->update($data);
        $updated_fields = $cancha->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RecursosRecord($cancha, "update", "canchas", $campos));
        return redirect()->route('inventario.busqueda', $cancha->id_parque);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(cancha_deportiva $cancha)
    {
        $dataId = $cancha->id_parque;
        event(new RecursosRecord($cancha, "delete", "canchas", "ALL"));
        $cancha->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
