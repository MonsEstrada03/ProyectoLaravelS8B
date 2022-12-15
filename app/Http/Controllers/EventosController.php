<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\EventoServicio;
use App\Models\EventosServicios;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Auth::user()->role =='gerente' ? Evento::all() : Evento::where('usuario_id',Auth::user()->id)->get();

        $eventosLook=[
            'gerente' => Evento::all(),
            'empleado' => Evento::where(['confirmado'=>1,'realizado'=>0])->get(),
            'cliente' => Evento::where('usuario_id',Auth::user()->id)->get()
        ];
        $eventos = $eventosLook[Auth::user()->role];
        // =='gerente' ? Evento::all() : Evento::where('usuario_id',Auth::user()->id)->get(); 
        
        return view('eventos.index',compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $paquete_id=$request->route()->parameters['paquete'];
        
        $usuarios = User::pluck('id', 'name');
       
        return view('eventos.create',compact('usuarios','paquete_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paquete_id=$request->route()->parameters['paquete'];

        $request->request->add([
            'usuario_id'=> Auth::user()->role == 'gerente' ? $request->usuario_id : Auth::user()->id,
            'paquete_id'=> $paquete_id
        ]);

        $request->validate([
            'usuario_id' =>'required',
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'proposito' => 'required',
            'invitados' => 'required',
        ]);
        $requestData=$request->all();
        if(Auth::user()->role == 'gerente'){
            $requestData['confirmado']=$request->input('confirmado') ? 1 : 0;
            $requestData['realizado']=$request->input('realizado') ? 1 : 0;
        }
        
        Evento::create($requestData);
     
        return redirect()->route('eventos.index')
                        ->with('success','Evento creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $fotos = Foto::where(['evento_id'=>$evento->id])->get();
       // $servicios = EventosServicios::where(['eventos_id'=>$evento->id])->get();
        $servicios = EventosServicios::select('eventos_servicios.*','eventos.proposito','servicios.nombre')
        ->join('eventos','eventos_servicios.eventos_id','=','eventos.id')
        ->join('servicios','eventos_servicios.servicio_id','=','servicios.id')
        ->get();
        return view('eventos.show',compact('evento','fotos','servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $fotos = Foto::where(['evento_id'=>$evento->id])->get();
        $usuarios = User::pluck('id', 'name');

        return view('eventos.edit',compact('evento','usuarios', 'fotos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'usuario_id' =>'required',
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_final' => 'required',
            'proposito' => 'required',
            'invitados' => 'required',
        ]);
        if(Auth::user()->role == 'gerente'){
            $request->request->add(['realizado'=>$request->input('realizado') ? 1 : 0]);
            $request->request->add(['confirmado'=>$request->input('confirmado') ? 1 : 0]);
        }
        $evento->update($request->all());
    
        return redirect()->route('eventos.index')
                        ->with('success','Evento actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
    
        return redirect()->route(Auth::user()->role =='gerente' ? 'eventos.index':'cliente.index')
                        ->with('success','Evento eliminado');
    }
}
