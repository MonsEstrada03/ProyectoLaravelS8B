<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Paquete;
use App\Models\Servicio;
use Illuminate\Http\Request;

class RelacionEventoServicioController extends Controller
{
    public function index(){
        $evento = Evento::find(1);
        $servicio = Servicio::find(2);
        return view('prueba', compact('evento','servicio'));
    }
}
