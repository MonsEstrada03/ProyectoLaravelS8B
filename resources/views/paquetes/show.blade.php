@extends('eventos.layout')
@extends('gerente.gerente')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver Paquete</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('paquetes.index') }}"> Atras</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Eventos:</strong>
                {{ $paquete->paquete }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $paquete->descripcion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $paquete->precio }}
            </div>
        </div>
        {{-- @foreach ($fotos as $foto)
            
            <div class="col-xs-3 col-sm-3 col-md-3">
                <img class="w-100" name="{{$foto->id}}" src="{{asset("storage/$foto->url")}}" />
                <label>{{$foto->descripcion}}</label>
                
            </div>      
        
        @endforeach --}}
        
    </div>
@endsection