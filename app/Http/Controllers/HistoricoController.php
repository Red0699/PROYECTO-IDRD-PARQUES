<?php

namespace App\Http\Controllers;

use App\Events\ParqueRecord;
use App\Events\RolRecord;
use App\Events\UserRecord;
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

    public function RolRecord(RolRecord $event){
        $data["nombreHistorico"] = "Historico Rol";
        $data["tabla"] = "Roles";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->rol->id;
        $data["resultado"] = "En construcción";
        if($event->accion == 'create'){
            $data["descripcion"] = "Se ha registrado un nuevo rol";
        }else if($event->accion == 'update'){
            $data["descripcion"] = "Se ha actualizado el rol ".$event->rol->name;
        }else if($event->accion == 'delete'){
            $data["descripcion"] = "Se ha eliminado el rol ".$event->rol->name;
        }
        Historico::create($data);        
    }

    public function UserRecord(UserRecord $event){
        $data["nombreHistorico"] = "Historico Usuario";
        $data["tabla"] = "User";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->user->id;
        $data["resultado"] = "En construcción";
        if($event->accion == 'create'){
            $data["descripcion"] = "Se ha registrado un nuevo usuario";
        }else if($event->accion == 'update'){
            $data["descripcion"] = "Se ha actualizado el rol ".$event->user->name;
        }else if($event->accion == 'delete'){
            $data["descripcion"] = "Se ha eliminado el rol ".$event->user->name;
        }else if($event->accion == 'profile'){
            $data["descripcion"] = "Se ha editado el perfil del usuario ".$event->user->name;
        }else if($event->accion == 'photo'){
            $data["descripcion"] = "Se ha editado la foto de perfil del usuario ".$event->user->name;
        }else if($event->accion == 'password'){
            $data["descripcion"] = "Se ha editado la contraseña de perfil del usuario ".$event->user->name;
        }
        Historico::create($data);        
    }
}
