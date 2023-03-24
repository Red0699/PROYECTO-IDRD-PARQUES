<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Models\cancha_deportiva;
use App\Http\Requests\CanchaRequest;
use Illuminate\Http\Request;
use App\Models\Parque;

class CanchaDeportivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        event(new RecursosRecord($cancha, "create", "canchas"));
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
        event(new RecursosRecord($cancha, "update", "canchas"));
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
        event(new RecursosRecord($cancha, "delete", "canchas"));
        $cancha->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
