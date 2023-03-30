<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\mobiliario;
use Illuminate\Http\Request;
use App\Models\Parque;
use App\Http\Requests\MobiliarioRequest;
use Illuminate\Support\Facades\Gate;

class MobiliarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('inventario_module'), 403);
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
        abort_if(Gate::denies('inventario_module'), 403);
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
        event(new RecursosRecord($mobiliario, "create", "mobiliarios", "ALL"));
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
        abort_if(Gate::denies('inventario_module'), 403);
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
        $updated_fields = $mobiliario->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RecursosRecord($mobiliario, "update", "mobiliarios", $campos));
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
        event(new RecursosRecord($mobiliario, "delete", "mobiliarios", "ALL"));
        $mobiliario->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
