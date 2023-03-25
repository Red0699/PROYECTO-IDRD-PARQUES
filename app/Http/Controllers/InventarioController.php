<?php

namespace App\Http\Controllers;

use App\Models\cancha_deportiva;
use App\Models\equipamiento;
use App\Models\escenario;
use App\Models\Juegos;
use App\Models\mobiliario;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use PhpParser\Node\Stmt\While_;

//use Barryvdh\DomPDF\Facade as PDF;

class InventarioController extends Controller
{
    //
    public function index(Request $request)
    {
        
        if($request->id == null){
            $data = Parque::all()->pluck('id')->sortBy('id')->first();
            //dd($data);
            return redirect()->route('inventario.busqueda', $data);
        }else{
            $data = $request->get('id');
            //dd($data);
            return redirect()->route('inventario.busqueda', $data);
        }
        
        //dd($request->id);
            
    }
    
    public function busqueda(Parque $parque)
    {
        $data = Parque::find($parque->id);
        //dd($dataPrueba);
        
        $parques = Parque::all();
        $juegos = Juegos::all()->where('idParque', '=', $data->id);
        $canchas = cancha_deportiva::all()->where('id_parque', '=', $data->id);
        $equipamientos = equipamiento::all()->where('idparque', '=', $data->id);
        $escenarios = escenario::all()->where('id_parque', '=', $data->id);
        $mobiliarios = mobiliario::all()->where('idparque', '=', $data->id);
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
            'data'
        ));
    }

    public function pdf(Parque $parque)

    {

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

        $pdf= PDF::loadView('pages.reportes.inventario', compact(
            'juegos',    
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios',
            'parque'
        ));//setOptions(['defaultFont' => 'sans-serif'])

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
