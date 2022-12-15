<?php

namespace App\Http\Controllers\api;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        
        $eventosLook=[
            'gerente' => Evento::all(),
            'empleado' => Evento::where(['confirmado'=>1,'realizado'=>0])->get(),
            'cliente' => Evento::where('usuario_id',auth()->guard('api')->user()->id)->get()
            
        ];
        $eventos = $eventosLook[auth()->guard('api')->user()->role];
        
        return response()->json($eventos);
    }
}
