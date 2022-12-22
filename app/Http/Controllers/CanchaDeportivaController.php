<?php

namespace App\Http\Controllers;

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
        return view('pages\inventario\canchadeportivas\index', compact('canchadeportivas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parques = Parque::all();
        return view('pages\inventario\canchas\create', compact('parques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CanchaRequest $request)
    {
        $data = $request->validated();
        cancha_deportiva::create($data);
        return redirect()->route('parque.index');
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
    public function edit(cancha_deportiva $cancha_deportiva)
    {
        $parques = Parque::all();
        return view('pages\inventario\canchadeportivas\edit', compact('canchadeportivas', 'parques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cancha_deportiva $cancha_deportiva)
    {
        $data = $request->validated();
        $cancha_deportiva->update($data);

        return redirect()->route('canchadeportivas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cancha_deportiva  $cancha_deportiva
     * @return \Illuminate\Http\Response
     */
    public function destroy(cancha_deportiva $cancha_deportiva)
    {
        $cancha_deportiva->delete();
        return redirect()->route('canchadeportivas.index');
    }
}
