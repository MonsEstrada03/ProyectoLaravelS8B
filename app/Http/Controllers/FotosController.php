<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento)
    {
        $fotos = Foto::where(['evento_id'=>$evento->id])->get();
        return view('fotos.index',compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $evento_id=$request->route()->id;
        return view('fotos.create',compact('evento_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento_id=$request->route()->id;
        $request->request->add([
            'evento_id'=> $evento_id,
            'usuario_id'=> Auth::user()->id,
        ]);

        $request->validate([
            'foto' =>'required|image|mimes:png,jpg,jpeg|max:2048',
            'descripcion' =>'required',
            'evento_id' => 'required',
            'usuario_id' => 'required'
        ]);

        if($request->file('foto')){
            $file=$request->file('foto');
            $ext = $request->foto->extension();
            $filename = Str::uuid()->toString().".".$ext;
            //Guardar en el folder publico
            $file->storeAs('public/images',$filename);
            $request->request->add([
                'url'=> 'images/'.$filename,
            ]);
        }
        Foto::create($request->only('url','descripcion','evento_id','usuario_id'));

        return redirect()->route('eventos.index')
        ->with('success','Foto agregada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        $foto->delete();
    
        // return redirect()->route(Auth::user()->role =='gerente' ? 'eventos.index':'cliente.index')
        // ->with('success','Foto eliminado');
        return redirect()->route('eventos.index')
                        ->with('success','Foto eliminada');
    }
}
