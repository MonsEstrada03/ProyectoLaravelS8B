<?php

namespace App\Http\Controllers;

use App\Http\Middleware\EmpleadoAuth;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(){

        return view('auth.catalogo');
       }
    
}
