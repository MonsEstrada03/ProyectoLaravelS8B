@extends('abonos.layout')
@extends('gerente.gerente')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sevicios</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('servicios.create') }}"> Crear Servicio</a>
            </div>
        </div>
    </div>
   
 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($servicios as $servicio)
        <tr>
            <td>{{ $servicio->id }}</td>
            <td>{{ $servicio->nombre }}</td>
            <td>{{ $servicio->descripcion  }}</td>
            <td>{{ $servicio->precio}}</td>
            <td>{{ $servicio->created_at}}</td>
            <td>
                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('servicios.show',$servicio->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('servicios.edit',$servicio->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection