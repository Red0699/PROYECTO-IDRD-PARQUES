<?php

namespace App\Http\Controllers;

use App\Http\Requests\JuegosRequest;
use App\Models\Juegos;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages\inventario\juegos\create');
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
        return redirect()->route('parque.index');
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
    public function edit(Juegos $juegos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juegos $juegos)
    {
        //
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
    }
}
