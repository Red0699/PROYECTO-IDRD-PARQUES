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
            return redirect()->route('inventario.busqueda', $data);
        }
        
        //dd($request->id);
            
    }
    
    public function busqueda(Parque $parque)
    {
        $data = $parque->id;
        $parques = Parque::all();
        $juegos = Juegos::all()->where('idParque', '=', $data);
        $canchas = cancha_deportiva::all()->where('id_parque', '=', $data);
        $equipamientos = equipamiento::all()->where('idparque', '=', $data);
        $escenarios = escenario::all()->where('id_parque', '=', $data);
        $mobiliarios = mobiliario::all()->where('idparque', '=', $data);
        $dataTemp = $data;
        //dd($data);

        return view('pages.inventario.main', compact(
            'parques', 
            'juegos',    
            'canchas',
            'equipamientos',
            'escenarios',
            'mobiliarios',
            'dataTemp',
        ));
    }
}
