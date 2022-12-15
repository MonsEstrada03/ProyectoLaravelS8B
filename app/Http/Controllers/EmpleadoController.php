<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EmpleadoAuth;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index(){

        return view('empleado.empleado');
       }
    
}
