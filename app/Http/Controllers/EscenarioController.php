<?php

namespace App\Http\Controllers;

use App\Models\escenario;
use Illuminate\Http\Request;
use App\Models\Parque;
use App\Http\Requests\EscenarioRequest;

class EscenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escenarios = escenario::all();
        return view('pages\inventario\escenario\index', compact('escenarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parques = Parque::all();
        return view('pages\inventario\escenario\create', compact('parques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscenarioRequest $request)
    {
        $data = $request->validated();
        escenario::create($data);
        return redirect()->route('parque.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, escenario $escenario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\escenario  $escenario
     * @return \Illuminate\Http\Response
     */
    public function destroy(escenario $escenario)
    {
        //
    }
}
