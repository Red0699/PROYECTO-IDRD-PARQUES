<?php

namespace App\Http\Controllers;

use App\Events\RecursosRecord;
use App\Http\Requests\JuegosRequest;
use App\Models\Juegos;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        abort_if(Gate::denies('inventario_module'), 403);
        $juegos = Juegos::all();
        return view('pages\inventario\juegos\index', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Parque $parque)
    {
        //
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\juegos\create', compact('parque'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JuegosRequest $request, Parque $parque)
    {
        //
        $data = $request->validated();
        $data['idParque'] = $parque->id;
        //dd($parque->id);
        $juego = Juegos::create($data);
        event(new RecursosRecord($juego, "create", "juegos","ALL"));
        return redirect()->route('diagnostico.create', [$juego->id, 'juego']);
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
    public function edit(Juegos $juego, Parque $parque)
    {
        //
        abort_if(Gate::denies('inventario_module'), 403);
        return view('pages\inventario\juegos\edit', compact('juego', 'parque'));
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
        $updated_fields = $juego->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new RecursosRecord($juego,"update", "juegos", $campos));
        return redirect()->route('inventario.busqueda', $juego->idParque);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juegos $juego)
    {
        //
        $dataId = $juego->idParque;
        event(new RecursosRecord($juego,"delete", "juegos", "ALL"));
        $juego->delete();
        return redirect()->route('inventario.busqueda', $dataId);
    }
}
