<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use App\Models\Parque;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    //
    public function index()
    {
        $parques = Parque::all();
        $juegos = Juegos::all();

        return view('pages.inventario.main', compact('parques', 'juegos'));
    }
}
