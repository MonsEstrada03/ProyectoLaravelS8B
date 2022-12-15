<?php

namespace App\Http\Controllers\api;

use App\Models\Paquete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaquetesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
       //
        // $paquetes=Paquete::all();
        $paquetes=Paquete::select('*')->addSelect(DB::raw("(select count(eventos.id) from eventos where eventos.paquete_id=paquetes.id) as eventos"))->get();
        //dd($paquetes);
        return response()->json($paquetes);
    }

}
