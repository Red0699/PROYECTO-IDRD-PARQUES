<?php

namespace App\Http\Controllers;

use App\Events\ParqueRecord;
use App\Http\Requests\ParqueRequest;
use App\Models\Parque;
use App\Models\cancha_deportiva;
use App\Models\equipamiento;
use App\Models\escenario;
use App\Models\Juegos;
use App\Models\mobiliario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use File;
use RealRashid\SweetAlert\Facades\Alert;
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
        abort_if(Gate::denies('parques_module'), 403);
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
        //Alert::success('Éxito', 'Los datos se han guardado correctamente');
        abort_if(Gate::denies('parques_module'), 403);
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
        //$parque = new Parque();
        $data = $request->validated();
        if(isset($data["foto"])){
            $data["foto"] = $filename = time().".".$data["foto"]->extension();
            $request->foto->move(public_path("images/parques"), $filename);
        }
        //
        $parque = Parque::create($data);
        //dd($parque);
        event(new ParqueRecord($parque, "create", "ALL")); //Evento para capturar la información y enviar los datos a la tabla de Historicos
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
        abort_if(Gate::denies('parques_module'), 403);
        $data = $parque->id;
        $juegos = Juegos::all()->where('idParque', '=', $data);
        $canchas = cancha_deportiva::all()->where('id_parque', '=', $data);
        $equipamientos = equipamiento::all()->where('idparque', '=', $data);
        $escenarios = escenario::all()->where('id_parque', '=', $data);
        $mobiliarios = mobiliario::all()->where('idparque', '=', $data);
        return view('pages.parques.show', compact(
            'parque',
            'juegos',
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios'
        ));
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
        abort_if(Gate::denies('parques_module'), 403);
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
        
        $data = $request->validated();
        
        //dd($fileFoto);
        if(isset($data["foto"])){
            $fileFoto = Parque::findOrFail($parque->id);
            //$ruta = asset('images/parques').'/'.$fileFoto->foto;
            
            //dd($fileFoto->foto);
            
            //Storage::delete($ruta);
            if($parque->foto != NULL){
                $ruta = public_path().'/images/parques/'.$fileFoto->foto;
                unlink($ruta);
            }
            
            $data["foto"] = $filename = time().".".$data["foto"]->extension();
            $request->foto->move(public_path("images/parques"), $filename);

            //$data["foto"] = $request->file('foto')->store('uploads','public');
        }

                
        $parque->update($data);
        $updated_fields = $parque->getChanges(); // Campos que han sido modificados
        
        //dd($updated_fields);
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        //dd($campos);
        event(new ParqueRecord($parque, "update", $campos));
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
        //dd($parque->foto);
        if(isset($parque->foto)){
            $ruta = public_path().'/images/parques/'.$parque->foto;
            unlink($ruta);
        }
        event(new ParqueRecord($parque, "delete", "ALL"));
        $parque->delete();
        return redirect()->route('parque.index');
    }
}
