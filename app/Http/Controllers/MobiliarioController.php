<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        $parques = Parque::all();
        return view('pages\inventario\mobiliario\create', compact('parques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobiliarioRequest $request)
    {
        $data = $request->validated();
        mobiliario::create($data);
        return redirect()->route('parque.index');
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
        $parques = Parque::all();
        return view('pages\inventario\mobiliario\edit', compact('mobiliario', 'parques'));
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

        return redirect()->route('mobiliario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mobiliario  $mobiliario
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobiliario $mobiliario)
    {
        $mobiliario->delete();
        return redirect()->route('mobiliario.index');
    }
}
