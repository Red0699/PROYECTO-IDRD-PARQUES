<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\equipamiento;
use Illuminate\Http\Request;
use App\Http\Requests\EquipamientoRequest;
use App\Models\Parque;

class EquipamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamientos = equipamiento::all();
        return view('pages\inventario\equipamiento\index', compact('equipamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        return view('pages\inventario\equipamiento\create', compact('parque'));
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
        event(new RecursosRecord($equipamiento, "create", "equipamientos"));
        return redirect()->route('inventario.busqueda', $parque->id);
    
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
        return view('pages\inventario\equipamiento\edit', compact('equipamiento'));
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
        event(new RecursosRecord($equipamiento, "update", "equipamientos"));
        return redirect()->route('inventario.busqueda', $equipamiento->idparque);
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
        event(new RecursosRecord($equipamiento, "delete", "equipamientos"));
        $equipamiento->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
