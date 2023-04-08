<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\escenario;
use Illuminate\Http\Request;
use App\Models\Parque;
use App\Http\Requests\EscenarioRequest;
use Illuminate\Support\Facades\Gate;

class EscenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('inventario_module'), 403);
        $escenarios = escenario::all();
        return view('pages\inventario\escenario\index', compact('escenarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\escenario\create', compact('parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscenarioRequest $request, Parque $parque)
    {
        $data = $request->validated();
        $data['id_parque'] = $parque->id;
        $escenario = escenario::create($data);
        event(new RecursosRecord($escenario, "create", "escenarios", "ALL"));
        return redirect()->route('diagnostico.create', [$parque->id, $escenario->id, 'escenario']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function show(escenario $escenario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function edit(escenario $escenario)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\escenario\edit', compact('escenario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function update(EscenarioRequest $request, escenario $escenario)
    {
        $data = $request->validated();
        $escenario->update($data);
        $updated_fields = $escenario->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RecursosRecord($escenario, "update", "escenarios", $campos));
        return redirect()->route('inventario.busqueda', $escenario->id_parque);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(escenario $escenario)
    {
        $dataId = $escenario->id_parque;
        event(new RecursosRecord($escenario, "delete", "escenarios", "ALL"));
        $escenario->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
