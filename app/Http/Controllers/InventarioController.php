<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = $request->get('id');
        $parques = Parque::all();
        $juegos = Juegos::all()->where('idParque', '=', $data);
        $dataTemp = $data;
        //dd($data);

        return view('pages.inventario.main', compact('parques', 'juegos', 'dataTemp'));
    }
}
