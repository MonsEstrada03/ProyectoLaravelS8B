@extends('usuarios.layout')
@extends('gerente.gerente')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Abono </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('abonos.index') }}"> Atras</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Evento_ id:</strong>
                {{ $abono->evento_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Usario_id:</strong>
                {{ $abono->usuario_id }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Monto:</strong>
                {{ $abono->monto }}
            </div>
@endsection