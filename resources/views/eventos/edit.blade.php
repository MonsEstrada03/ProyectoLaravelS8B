@extends('eventos.layout')
@extends('gerente.gerente')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Evento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route(Auth::user()->role=='gerente' ? 'eventos.index':'cliente.index') }}"> Atras</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        Existen problemas con los datos capturados<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('eventos.update',$evento->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usuario_Id</strong>
               <select name="usuario_id" {{ Auth::user()->role=='cliente' ? 'disabled' : '' }} >
                @foreach ($usuarios as $name => $id)
                    <option {{$evento->usuario_id==$id ? 'selected':''}} value="{{$id}}"> {{$name}} </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha del Evento:</strong>
                <input type="date" name="fecha" value="{{$evento->fecha}}" class="form-control" placeholder="Captura Fecha del Evento">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora de Inicio:</strong>
                <input type="time" name="hora_inicio" value="{{$evento->hora_inicio}}" class="form-control" placeholder="Captura Hora de inicio">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora Final:</strong>
                <input type="time" name="hora_final" value="{{$evento->hora_final}}" class="form-control" placeholder="Captura Hora de inicio">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proposito:</strong>
                <textarea class="form-control" style="height:150px" name="proposito"  placeholder="Proposito"> {{$evento->proposito}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invitado</strong>
                <input type="text" name="invitados" value="{{$evento->invitados}}" class="form-control" placeholder="Invitados">
            </div>
         @if(Auth::user()->role == 'gerente')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirmado</strong>
                    <input type="checkbox" name="confirmado" {{$evento->confirmado==1 ? 'checked' : '' }} >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Realizado</strong>
                    <input type="checkbox" name="realizado" {{$evento->realizado==1 ? 'checked' : '' }}>
                </div>
            </div>
        @endif

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
    </form>
    @foreach ($fotos as $foto)
            <form action="{{ route('fotos.destroy',$foto->id) }}" method="POST">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <img class="w-100" name="{{$foto->id}}" src="{{asset("storage/$foto->url")}}" />
                <label>{{$foto->descripcion}}</label>
                @csrf
                 @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>   
            </div>      
            </form> 
        @endforeach
@endsection