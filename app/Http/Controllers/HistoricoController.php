<?php

namespace App\Http\Controllers;

use App\Events\ParqueRecord;
use App\Models\Historico;
use Illuminate\Http\Request;

class HistoricoController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ParqueRecord(ParqueRecord $event)
    {
        //
        $data["nombreHistorico"] = "Historico Parque";
        $data["tabla"] = "Parque";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        //dd($event->parque->id);
        $data["id_record"] = $event->parque->id;
        $data["resultado"] = "En construcción";
        if($event->accion == 'create'){
            $data["descripcion"] = "Se ha registrado un nuevo parque";
        }else if($event->accion == 'update'){
            $data["descripcion"] = "Se ha actualizado el parque ".$event->parque->nombreParque;
        }else if($event->accion == 'delete'){
            $data["descripcion"] = "Se ha eliminado el parque ".$event->parque->nombreParque;
        }

        Historico::create($data);
    }

}
