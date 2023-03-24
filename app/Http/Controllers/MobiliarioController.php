<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\mobiliario;
use Illuminate\Http\Request;
use App\Models\Parque;
use App\Http\Requests\MobiliarioRequest;

class MobiliarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobiliarios = mobiliario::all();
        return view('pages\inventario\mobiliario\index', compact('mobiliarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        
        return view('pages\inventario\mobiliario\create', compact('parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobiliarioRequest $request, Parque $parque)
    {
        $data = $request->validated();
        $data['idparque'] = $parque->id;
        $mobiliario = mobiliario::create($data);
        event(new RecursosRecord($mobiliario, "create", "mobiliarios"));
        return redirect()->route('inventario.busqueda', $parque->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mobiliario  $mobiliario
     * @return \Illuminate\Http\Response
     */
    public function show(mobiliario $mobiliario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mobiliario  $mobiliario
     * @return \Illuminate\Http\Response
     */
    public function edit(mobiliario $mobiliario)
    {
        return view('pages\inventario\mobiliario\edit', compact('mobiliario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mobiliario  $mobiliario
     * @return \Illuminate\Http\Response
     */
    public function update(MobiliarioRequest $request, mobiliario $mobiliario)
    {
        $data = $request->validated();
        $mobiliario->update($data);
        event(new RecursosRecord($mobiliario, "update", "mobiliarios"));
        return redirect()->route('inventario.busqueda', $mobiliario->idparque);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mobiliario  $mobiliario
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobiliario $mobiliario)
    {
        $dataId = $mobiliario->idparque;
        event(new RecursosRecord($mobiliario, "delete", "mobiliarios"));
        $mobiliario->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
