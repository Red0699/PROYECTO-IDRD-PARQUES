<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VistaParqueController extends Controller
{
    //

    public function index(){
        return view('pages\parques\home\view');
    }
}
