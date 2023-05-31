<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\equipamiento;
use Illuminate\Http\Request;
use App\Http\Requests\EquipamientoRequest;
use App\Models\Parque;
use Illuminate\Support\Facades\Gate;

class EquipamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('inventario_module'), 403);
        $equipamientos = equipamiento::all();
        return view('pages.inventario.equipamiento.index', compact('equipamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages.inventario.equipamiento.create', compact('parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipamientoRequest $request, Parque $parque)
    {
        $data = $request->validated();
        $data['idparque'] = $parque->id;
        $equipamiento = equipamiento::create($data);
        event(new RecursosRecord($equipamiento, "create", "equipamientos", "ALL"));
        return redirect()->route('diagnostico.create', [$parque->id, $equipamiento->id, 'equipamiento']);
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function show(equipamiento $equipamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(equipamiento $equipamiento)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages.inventario.equipamiento.edit', compact('equipamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function update(EquipamientoRequest $request, equipamiento $equipamiento)
    {
        $data = $request->validated();
        $equipamiento->update($data);
        $updated_fields = $equipamiento->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RecursosRecord($equipamiento, "update", "equipamientos", $campos));
        return redirect()->route('inventario.busqueda', $equipamiento->idparque)->with('success', 'Se ha editado el equipamiento correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipamiento  $equipamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipamiento $equipamiento)
    {
        $dataId = $equipamiento->idparque;
        event(new RecursosRecord($equipamiento, "delete", "equipamientos", "ALL"));
        $equipamiento->delete();
        return redirect()->route('inventario.busqueda', $dataId)->with('success', 'Se ha eliminado el equipamiento');
    }
}
