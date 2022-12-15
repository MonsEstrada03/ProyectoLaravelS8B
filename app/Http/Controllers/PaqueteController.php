<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{

    public function servicios(){
        return $this->belongsToMany(Servicio::class, 'paquetes_servicios');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $paquetes=Paquete::all();
        $paquetes=Paquete::select('*')->addSelect(DB::raw("(select count(eventos.id) from eventos where eventos.paquete_id=paquetes.id) as eventos"))->get();
        return view('paquetes.index',compact('paquetes'));
        //dd($paquetes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['activo'=>$request->input('activo') ? 1 : 0]);
        $request->validate([
            'paquete' =>'required',
            'descripcion' =>'required',
            'precio' => 'required',
        ]);
        Paquete::create($request->all());

        return redirect()->route('paquetes.index')
                        ->with('success','Paquete creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paquete $paquete)
    {
        return view('paquetes.show',compact('paquete'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paquete $paquete)
    {
        return view('paquetes.edit',compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paquete $paquete)
    {
        $request->request->add(['activo'=>$request->input('activo') ? 1 : 0]);
        $request->validate([
            'paquete' =>'required',
            'descripcion' =>'required',
            'precio' => 'required',
        ]);
        $paquete->update($request->all());
    
        return redirect()->route('paquetes.index')
                        ->with('success','Paquete actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(paquete $paquete)
    {
        $paquete->delete();
        return redirect()->route('paquetes.index')
                        ->with('success','Paquete eliminado');
    }
}
