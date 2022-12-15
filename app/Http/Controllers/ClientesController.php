<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::where('usuario_id',1)->get();
        
        //return view('clientes.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::pluck('id', 'name');
        $eventos = Evento::where('usuario_id',1)->get();
        return view('clientes.create',compact('usuarios', 'eventos'));
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
            'usuario_id' => 'required',
            'evento' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
        $requestData=$request->all();
        $requestData['confirmado']=$request->input('confirmado') ? 1 : 0;

        Evento::create($requestData);
     
        return redirect()->route('cliente.index')
                        ->with('success','Evento creado cliente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $evento)
    {
       
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $evento)
    {
        $request->validate([
            'evento' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
    
        $evento->update($request->all());
    
        return redirect()->route('cliente.index')
                        ->with('success','Evento actualizado cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
    
        return redirect()->route('cliente.index')
                        ->with('success','Evento eliminado');
    }
}
