@extends('fotos.layout')
@extends('gerente.gerente')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir Nuevo Evento</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('eventos.index') }}"> Atras</a>
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
   
<form action="{{ route('paquetes_eventos.store',$paquete_id) }}" method="POST">
    @csrf
  
     <div class="row">
     @if(Auth::user()->role == 'gerente')
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Usuario_Id</strong>
                    <select name="usuario_id" >
                    @foreach ($usuarios as $name => $id)
                        <option value="{{$id}}"> {{$name}} </option>
                    @endforeach
                    </select>

                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha del Evento:</strong>
                <input type="date" name="fecha" class="form-control" placeholder="Captura Fecha del Evento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora de Inicio:</strong>
                <input type="time" name="hora_inicio" class="form-control" placeholder="Captura Hora de inicio">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora Final:</strong>
                <input type="time" name="hora_final" class="form-control" placeholder="Captura Hora de inicio">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proposito:</strong>
                <textarea class="form-control" style="height:150px" name="proposito" placeholder="Proposito"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invitado</strong>
                <input type="text" name="invitados" class="form-control" placeholder="Invitados">
            </div>
        </div>
         @if(Auth::user()->role == 'gerente')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirmado</strong>
                    <input type="checkbox" name="confirmado" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Realizado</strong>
                    <input type="checkbox" name="realizado" >
                </div>
            </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>
@endsection