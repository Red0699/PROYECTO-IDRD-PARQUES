<?php

namespace App\Http\Controllers;

use App\Models\cancha_deportiva;
use App\Models\equipamiento;
use App\Models\escenario;
use App\Models\Historico;
use App\Models\Juegos;
use App\Models\mobiliario;
use App\Models\Parque;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PDF;
use PhpParser\Node\Stmt\While_;

//use Barryvdh\DomPDF\Facade as PDF;

class InventarioController extends Controller
{
    //
    public function index(Request $request)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        if ($request->id == null) {
            $data = Parque::all()->pluck('id')->sortBy('id')->first();
            //dd($data);
            return redirect()->route('inventario.busqueda', $data);
        } else {
            $data = $request->get('id');
            //dd($data);
            return redirect()->route('inventario.busqueda', $data);
        }

        //dd($request->id);

    }

    public function busqueda(Parque $parque)
    {
        abort_if(Gate::denies('inventario_module'), 403);
        $data = Parque::find($parque->id);
        //dd($dataPrueba);

        $parques = Parque::all();
        $juegos = Juegos::all()->where('idParque', '=', $data->id);
        $canchas = cancha_deportiva::all()->where('id_parque', '=', $data->id);
        $equipamientos = equipamiento::all()->where('idparque', '=', $data->id);
        $escenarios = escenario::all()->where('id_parque', '=', $data->id);
        $mobiliarios = mobiliario::all()->where('idparque', '=', $data->id);
        $historico = Historico::where('id_inventario', $data->id)
            ->orWhere(function ($query) use ($data) {
                $query->where('id_record', $data->id)
                    ->where('tabla', 'Parque');
            })
            ->latest('updated_at')
            ->first();


        $user = User::where('id', $historico->id_usuario)->first();

        $historicoAntiguo = Historico::where('id_record', $parque->id)
            ->where('tabla', 'Parque')
            ->orderBy('created_at', 'asc')
            ->first();

        $userAntiguo = User::where('id', $historicoAntiguo->id_usuario)->first();

        $dataTemp = $data->id;
        //dd($parque);

        return view('pages.inventario.main', compact(
            'parques',
            'juegos',
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios',
            'dataTemp',
            'data',
            'historico',
            'historicoAntiguo',
            'user',
            'userAntiguo'
        ));
    }

    public function pdf(Parque $parque)

    {
        abort_if(Gate::denies('inventario_module'), 403);
        $data = $parque->id;
        $juegos = Juegos::all()->where('idParque', '=', $data);
        $canchas = cancha_deportiva::all()->where('id_parque', '=', $data);
        $equipamientos = equipamiento::all()->where('idparque', '=', $data);
        $escenarios = escenario::all()->where('id_parque', '=', $data);
        $mobiliarios = mobiliario::all()->where('idparque', '=', $data);


        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE,
            ]
        ]);

        $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);

        $pdf = PDF::loadView('pages.reportes.inventario', compact(
            'juegos',
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios',
            'parque'
        )); //setOptions(['defaultFont' => 'sans-serif'])

        return $pdf->stream();

        /*
        
        return view('pages.reportes.inventario', compact(
            'juegos',    
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios',
            'parque'
        ));
*/
    }
}
