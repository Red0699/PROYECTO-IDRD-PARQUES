<?php

namespace App\Http\Controllers;

use App\Events\ParqueRecord;
use App\Events\RecursosRecord;
use App\Events\RolRecord;
use App\Events\UserRecord;
use App\Models\Historico;
use App\Models\Parque;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Parque $parque, Request $request)
    {
        abort_if(Gate::denies('historicos_module'), 403);
        $tipo = $request->tipo;
        $año = $request->año;
        $mes = $request->mes;
        if ($tipo == null) {
            $tipo = 'Todos';
        }

        $informeJuegos = Historico::query()
            ->join('users', 'historicos.id_usuario', '=', 'users.id')
            ->select('users.name', 'historicos.*')
            ->where('id_inventario', '=', $parque->id)
            ->where('tabla', '=', 'juegos');

        $informeCanchas = Historico::query()
            ->join('users', 'historicos.id_usuario', '=', 'users.id')
            ->select('users.name', 'historicos.*')
            ->where('id_inventario', '=', $parque->id)
            ->where('tabla', '=', 'canchas');

        $informeEquipamientos = Historico::query()
            ->join('users', 'historicos.id_usuario', '=', 'users.id')
            ->select('users.name', 'historicos.*')
            ->where('id_inventario', '=', $parque->id)
            ->where('tabla', '=', 'equipamientos');

        $informeMobiliarios = Historico::query()
            ->join('users', 'historicos.id_usuario', '=', 'users.id')
            ->select('users.name', 'historicos.*')
            ->where('id_inventario', '=', $parque->id)
            ->where('tabla', '=', 'mobiliarios');

        $informeEscenarios = Historico::query()
            ->join('users', 'historicos.id_usuario', '=', 'users.id')
            ->select('users.name', 'historicos.*')
            ->where('id_inventario', '=', $parque->id)
            ->where('tabla', '=', 'escenarios');

        if ($año) {
            $informeJuegos->whereYear('historicos.updated_at', $año);
            $informeCanchas->whereYear('historicos.updated_at', $año);
            $informeEquipamientos->whereYear('historicos.updated_at', $año);
            $informeMobiliarios->whereYear('historicos.updated_at', $año);
            $informeEscenarios->whereYear('historicos.updated_at', $año);
        }
        if ($mes) {
            $informeJuegos->whereMonth('historicos.updated_at', $mes);
            $informeCanchas->whereMonth('historicos.updated_at', $mes);
            $informeEquipamientos->whereMonth('historicos.updated_at', $mes);
            $informeMobiliarios->whereMonth('historicos.updated_at', $mes);
            $informeEscenarios->whereMonth('historicos.updated_at', $mes);
        }

        $informeJuegos = $informeJuegos->get();
        $informeCanchas = $informeCanchas->get();
        $informeEquipamientos = $informeEquipamientos->get();
        $informeMobiliarios = $informeMobiliarios->get();
        $informeEscenarios = $informeEscenarios->get();

        return view('pages\informes\historicos\historicoInventario', compact(
            'informeJuegos',
            'informeCanchas',
            'informeEquipamientos',
            'informeMobiliarios',
            'informeEscenarios',
            'parque',
            'tipo',
            'año',
            'mes'
        ));
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
        $data = new Historico;
        $data["nombreHistorico"] = "Historico Parque";
        $data["tabla"] = "Parque";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        $data["campos"] = $event->camposActualizados;
        $data["id_record"] = $event->parque->id;
        $data["resultado"] = "En construcción";
        if ($event->accion == 'create') {
            $data["descripcion"] = "Se ha registrado un nuevo parque";
        } else if ($event->accion == 'update') {
            $data["descripcion"] = "Se ha actualizado el parque " . $event->parque->nombreParque;
        } else if ($event->accion == 'delete') {
            $data["descripcion"] = "Se ha eliminado el parque " . $event->parque->nombreParque;
        }

        $data["created_at"] = $event->parque->created_at;
        $data["updated_at"] = $event->parque->updated_at;
        $data->save();
    }

    public function RolRecord(RolRecord $event)
    {
        $data = new Historico;
        $data["nombreHistorico"] = "Historico Rol";
        $data["tabla"] = "Roles";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->rol->id;
        $data["campos"] = $event->campos;
        $data["resultado"] = "En construcción";
        if ($event->accion == 'create') {
            $data["descripcion"] = "Se ha registrado un nuevo rol";
        } else if ($event->accion == 'update') {
            $data["descripcion"] = "Se ha actualizado el rol " . $event->rol->name;
        } else if ($event->accion == 'delete') {
            $data["descripcion"] = "Se ha eliminado el rol " . $event->rol->name;
        }
        $data["created_at"] = $event->rol->created_at;
        $data["updated_at"] = $event->rol->updated_at;
        $data->save();
    }

    public function UserRecord(UserRecord $event)
    {
        $data = new Historico;
        $data["nombreHistorico"] = "Historico Usuario";
        $data["tabla"] = "User";
        $data["accion"] = $event->accion;
        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->user->id;
        $data["campos"] = $event->campos;
        $data["resultado"] = "En construcción";
        if ($event->accion == 'create') {
            $data["descripcion"] = "Se ha registrado un nuevo usuario";
        } else if ($event->accion == 'update') {
            $data["descripcion"] = "Se ha actualizado el rol " . $event->user->name;
        } else if ($event->accion == 'delete') {
            $data["descripcion"] = "Se ha eliminado el rol " . $event->user->name;
        } else if ($event->accion == 'profile') {
            $data["descripcion"] = "Se ha editado el perfil del usuario " . $event->user->name;
        } else if ($event->accion == 'photo') {
            $data["descripcion"] = "Se ha editado la foto de perfil del usuario " . $event->user->name;
        } else if ($event->accion == 'password') {
            $data["descripcion"] = "Se ha editado la contraseña de perfil del usuario " . $event->user->name;
        }
        $data["created_at"] = $event->user->created_at;
        $data["updated_at"] = $event->user->updated_at;
        $data->save();
    }

    public function InventarioRecord(RecursosRecord $event)
    {
        $data = new Historico;
        if ($event->tipo == "juegos") {
            $data["nombreHistorico"] = "Historico Juego Infantil";
            $data["tabla"] = "juegos";
            $data["id_inventario"] = $event->recurso->idParque;
            $data["resultado"] = "En construcción";
            if ($event->accion == 'create') {
                $data["descripcion"] = "Se ha registrado un nuevo juego infantil del parque con ID: " . $event->recurso->idParque;
            } else if ($event->accion == 'update') {
                $data["descripcion"] = "Se ha actualizado el juego infantil del ID " . $event->recurso->id;
            } else if ($event->accion == 'delete') {
                $data["descripcion"] = "Se ha eliminado el juego infantil del ID " . $event->recurso->id;
            }
        } else if ($event->tipo == "canchas") {
            $data["nombreHistorico"] = "Historico Cancha Deportiva";
            $data["tabla"] = "cancha_deportivas";
            $data["id_inventario"] = $event->recurso->id_parque;
            $data["resultado"] = "En construcción";
            if ($event->accion == 'create') {
                $data["descripcion"] = "Se ha registrado una nueva cancha deportiva del parque con ID: " . $event->recurso->id_parque;
            } else if ($event->accion == 'update') {
                $data["descripcion"] = "Se ha actualizado la cancha deportiva del ID " . $event->recurso->id;
            } else if ($event->accion == 'delete') {
                $data["descripcion"] = "Se ha eliminado la cancha deportiva del ID " . $event->recurso->id;
            }
        } else if ($event->tipo == "equipamientos") {
            $data["nombreHistorico"] = "Historico Equipamiento";
            $data["tabla"] = "juegos";
            $data["id_inventario"] = $event->recurso->idparque;
            $data["resultado"] = "En construcción";
            if ($event->accion == 'create') {
                $data["descripcion"] = "Se ha registrado un nuevo equipamiento del parque con ID: " . $event->recurso->idparque;
            } else if ($event->accion == 'update') {
                $data["descripcion"] = "Se ha actualizado el equipamiento del ID " . $event->recurso->id;
            } else if ($event->accion == 'delete') {
                $data["descripcion"] = "Se ha eliminado el equipamiento del ID " . $event->recurso->id;
            }
        } else if ($event->tipo == "mobiliarios") {
            $data["nombreHistorico"] = "Historico Mobiliario Urbano";
            $data["tabla"] = "mobiliarios";
            $data["id_inventario"] = $event->recurso->idparque;
            $data["resultado"] = "En construcción";
            if ($event->accion == 'create') {
                $data["descripcion"] = "Se ha registrado un nuevo mobiliario urbano del parque con ID: " . $event->recurso->idparque;
            } else if ($event->accion == 'update') {
                $data["descripcion"] = "Se ha actualizado el mobiliario urbano del ID " . $event->recurso->id;
            } else if ($event->accion == 'delete') {
                $data["descripcion"] = "Se ha eliminado el mobiliario urbano del ID " . $event->recurso->id;
            }
        } else if ($event->tipo == "escenarios") {
            $data["nombreHistorico"] = "Historico Escenario Deportivo";
            $data["tabla"] = "escenarios";
            $data["id_inventario"] = $event->recurso->id_parque;
            $data["resultado"] = "En construcción";
            if ($event->accion == 'create') {
                $data["descripcion"] = "Se ha registrado un nuevo escenario deportivo del parque con ID: " . $event->recurso->id_parque;
            } else if ($event->accion == 'update') {
                $data["descripcion"] = "Se ha actualizado el escenario deportivo del ID " . $event->recurso->id;
            } else if ($event->accion == 'delete') {
                $data["descripcion"] = "Se ha eliminado el escenario deportivo del ID " . $event->recurso->id;
            }
        }

        $data["id_usuario"] = auth()->user()->id;
        $data["id_record"] = $event->recurso->id;
        $data["accion"] = $event->accion;
        $data["campos"] = $event->camposActualizados;
        $data["created_at"] = $event->recurso->created_at;
        $data["updated_at"] = $event->recurso->updated_at;
        $data->save();
    }
}
