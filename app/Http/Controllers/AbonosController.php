<?php

namespace App\Http\Controllers;

use App\Models\Abono;
use App\Models\Evento;
use App\Models\Paquete;
use App\Models\User;
use Illuminate\Http\Request;

class AbonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$abonos = Abono::select('abonos.*','eventos.evento')->join('eventos','abonos.evento_id','=','eventos.id')->get();
        $abonos = Abono::all();
        return view('abonos.index',compact('abonos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::pluck('id', 'name');
        $eventos = Evento::pluck('id', 'proposito');
        $paquetes = Paquete::pluck('id','paquete');
        $abonos = Abono::all();
        
        return view('abonos.create',compact('usuarios','eventos','abonos', 'paquetes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'evento_id' =>'required',
            'usuario_id' =>'required',
            'paquete_id' =>'required',
            'monto' => 'required',
        ]);
        
        Abono::create($request->all());
        return redirect()->route('abonos.index')
                        ->with('success','Abono creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function show(Abono $abono)
    {
        return view('abonos.show',compact('abono'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function edit(Abono $abono)
    {
        $usuarios = User::pluck('id', 'name');
        $eventos = Evento::pluck('id', 'proposito');
        $paquetes = Paquete::pluck('id','paquete'); 
        return view('abonos.edit',compact('usuarios','eventos','abono', 'paquetes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abono $abono)
    {
        $request->validate([
            'evento_id' =>'required',
            'usuario_id' =>'required',
            'paquete_id' =>'required',
            'monto' => 'required',
        ]);
    
        $abono->update($request->all());
    
        return redirect()->route('abonos.index')
                        ->with('success','Abono actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abono  $abono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abono $abono)
    {
        $abono->delete();
    
        return redirect()->route('abonos.index')
                        ->with('success','Abono eliminado');
    }
}
