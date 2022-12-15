@extends('eventos.layout')
@extends('gerente.gerente')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nuevo Abono</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('abonos.index') }}"> Atras</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
    Existen problemas con los datos capturados
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('abonos.store') }}" method="POST">
    @csrf
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Evento_Id</strong>
                <select name="evento_id" {{ Auth::user()->role=='cliente' ? 'disabled' : '' }} >
                @foreach ($eventos as $proposito => $id)
                    <option value="{{$id}}"> {{$proposito}} </option>
                @endforeach 
                </select>
            </div>
        </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuario_Id</strong>
               <select name="usuario_id" {{ Auth::user()->role=='cliente' ? 'disabled' : '' }} >
                @foreach ($usuarios as $name => $id)
                    <option value="{{$id}}"> {{$name}} </option>
                @endforeach
                </select>

            </div>
        </div>
        <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Paquete</strong>
                <select name="paquete_id" {{ Auth::user()->role=='cliente' ? 'disabled' : '' }} >
                @foreach ($paquetes as $paquete => $id)
                    <option value="{{$id}}"> {{$paquete}} </option>
                @endforeach 
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto</strong>
                <input type="number" name="monto" class="form-control" placeholder="Monto">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>
@endsection