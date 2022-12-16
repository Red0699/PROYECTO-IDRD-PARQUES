<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParqueRequest;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ParqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('parks_module'), 403);
        $parques = Parque::all();
        return view('pages.parques.index', compact('parques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.parques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParqueRequest $request)
    {
        //
        Parque::create($request->only(
            'nombreParque', 
            'localidad', 
            'area',
            'escala',
            'estrato',
            'direccion'
        ));

        return redirect()->route('parque.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function show(Parque $parque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function edit(Parque $parque)
    {
        //
        abort_if(Gate::denies('parks_module'), 403);
        return view('pages.parques.edit', compact('parque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function update(ParqueRequest $request, Parque $parque)
    {
        //
        $parque->update($request->only(
            'nombreParque', 
            'localidad', 
            'area',
            'escala',
            'estrato',
            'direccion'
        ));

        return redirect()->route('parque.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parque  $parque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parque $parque)
    {
        //
        $parque->delete();

        return redirect()->route('parque.index');
    }
}
