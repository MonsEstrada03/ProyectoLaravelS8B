@extends('eventos.layout')
@extends('gerente.gerente')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver Evento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route(Auth::user()->role=='gerente' ? 'eventos.index':'cliente.index') }}"> Atras</a>
            </div>
        </div>
    </div>
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha del evento:</strong>
                {{ $evento->fecha }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora Inicio:</strong>
                {{ $evento->hora_inicio }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora Final:</strong>
                {{ $evento->hora_final }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proposito:</strong>
                {{ $evento->proposito }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Invitados:</strong>
                {{ $evento->invitados }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirmado:</strong>
                {{ $evento->confirmado }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Realizado:</strong>
                {{ $evento->realizado }}
            </div>
        </div>

 <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Evento</th>
            <th>Servicio</th>
            <th>Costo</th>
            <th>Fecha</th>
        </tr>

        @foreach ($servicios as $servicio)
        <tr>
            <td>{{ $servicio->id }}</td>
            <td>{{ $servicio->proposito }}</td>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->costo }}</td>
            <td>{{ $servicio->created_at}}</td>
        </tr>
        @endforeach
        <tfoot> 
            <tr>
                <td colspan="3">
                Total:
                </td>
                <td>
                500.00
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>


        @foreach ($fotos as $foto)
            
            <div class="col-xs-3 col-sm-3 col-md-3">
                <img class="w-100" name="{{$foto->id}}" src="{{asset("storage/$foto->url")}}" />
                <label>{{$foto->descripcion}}</label>
                
            </div>      
        
        @endforeach
        
    </div>
@endsection