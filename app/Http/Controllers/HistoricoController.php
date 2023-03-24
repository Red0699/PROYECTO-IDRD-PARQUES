<?php

namespace App\Http\Controllers;

use App\Events\ParqueRecord;
use App\Events\RecursosRecord;
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

    public function InventarioRecord(RecursosRecord $event){
        if($event->tipo == "juegos"){
            $data["nombreHistorico"] = "Historico Juego Infantil";
            $data["tabla"] = "juegos";
            $data["resultado"] = "En construcción";
            if($event->accion == 'create'){
                $data["descripcion"] = "Se ha registrado un nuevo juego infantil del parque con ID: ".$event->recurso->idParque;
            }else if($event->accion == 'update'){
                $data["descripcion"] = "Se ha actualizado el juego infantil del ID ".$event->recurso->id;
            }else if($event->accion == 'delete'){
                $data["descripcion"] = "Se ha eliminado el juego infantil del ID ".$event->recurso->id;
            }
        }else if($event->tipo == "canchas"){
            $data["nombreHistorico"] = "Historico Cancha Deportiva";
            $data["tabla"] = "cancha_deportivas";
            $data["resultado"] = "En construcción";
            if($event->accion == 'create'){
                $data["descripcion"] = "Se ha registrado una nueva cancha deportiva del parque con ID: ".$event->recurso->id_parque;
            }else if($event->accion == 'update'){
                $data["descripcion"] = "Se ha actualizado la cancha deportiva del ID ".$event->recurso->id;
            }else if($event->accion == 'delete'){
                $data["descripcion"] = "Se ha eliminado la cancha deportiva del ID ".$event->recurso->id;
            }
        }else if($event->tipo == "equipamientos"){
            $data["nombreHistorico"] = "Historico Equipamiento";
            $data["tabla"] = "juegos";
            $data["resultado"] = "En construcción";
            if($event->accion == 'create'){
                $data["descripcion"] = "Se ha registrado un nuevo equipamiento del parque con ID: ".$event->recurso->idparque;
            }else if($event->accion == 'update'){
                $data["descripcion"] = "Se ha actualizado el equipamiento del ID ".$event->recurso->id;
            }else if($event->accion == 'delete'){
                $data["descripcion"] = "Se ha eliminado el equipamiento del ID ".$event->recurso->id;
            }
        }else if($event->tipo == "mobiliarios"){
            $data["nombreHistorico"] = "Historico Mobiliario Urbano";
            $data["tabla"] = "mobiliarios";
            $data["resultado"] = "En construcción";
            if($event->accion == 'create'){
                $data["descripcion"] = "Se ha registrado un nuevo mobiliario urbano del parque con ID: ".$event->recurso->idparque;
            }else if($event->accion == 'update'){
                $data["descripcion"] = "Se ha actualizado el mobiliario urbano del ID ".$event->recurso->id;
            }else if($event->accion == 'delete'){
                $data["descripcion"] = "Se ha eliminado el mobiliario urbano del ID ".$event->recurso->id;
            }
        }else if($event->tipo == "escenarios"){
            $data["nombreHistorico"] = "Historico Escenario Deportivo";
            $data["tabla"] = "escenarios";
            $data["resultado"] = "En construcción";
            if($event->accion == 'create'){
                $data["descripcion"] = "Se ha registrado un nuevo escenario deportivo del parque con ID: ".$event->recurso->id_parque;
            }else if($event->accion == 'update'){
                $data["descripcion"] = "Se ha actualizado el escenario deportivo del ID ".$event->recurso->id;
            }else if($event->accion == 'delete'){
                $data["descripcion"] = "Se ha eliminado el escenario deportivo del ID ".$event->recurso->id;
            }
        }

        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->recurso->id;
        $data["accion"] = $event->accion;
        Historico::create($data);   
    }
}
