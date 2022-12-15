@extends('eventos.layout')
@extends('gerente.gerente')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Paquete</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('paquetes.index') }}"> Atras</a>
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
  
    <form action="{{ route('paquetes.update',$paquete->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Paquete</strong>
                <input type="text" name="paquete" value="{{$paquete->paquete}}" class="form-control" placeholder="Captura Paquete" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripcion"> {{$paquete->descripcion}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio</strong>
                <input type="text" name="precio" value="{{$paquete->precio}}" class="form-control" placeholder="Precio">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Activo</strong>
                <input type="checkbox" name="activo" {{$paquete->activo==1 ? 'checked' : '' }} >
            </div>
        </div>
            
     
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
    </form>
   
@endsection