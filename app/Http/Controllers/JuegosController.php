<?php

namespace App\Http\Controllers;

use App\Http\Requests\JuegosRequest;
use App\Models\Juegos;
use App\Models\Parque;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $juegos = Juegos::all();
        return view('pages\inventario\juegos\index', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $parques = Parque::all();
        return view('pages\inventario\juegos\create', compact('parques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JuegosRequest $request)
    {
        //
        $data = $request->validated();
        Juegos::create($data);
        return redirect()->route('juegos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function show(Juegos $juegos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function edit(Juegos $juego)
    {
        //
        $parques = Parque::all();
        return view('pages\inventario\juegos\edit', compact('juego', 'parques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function update(JuegosRequest $request, Juegos $juego)
    {
        //
        $data = $request->validated();
        $juego->update($data);

        return redirect()->route('juegos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juegos $juegos)
    {
        //
        $juegos->delete();
        return redirect()->route('juegos.index');
    }
}
