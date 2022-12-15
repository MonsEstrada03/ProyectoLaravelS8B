@extends('paquetes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> PAQUETES </h2>
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
            <th>Paquete</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Activo</th>
            <th>Eventos</th>
            <th>Fecha</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($paquetes as $paquete)
        <tr>
            <td>{{ $paquete->id }}</td>
            <td>{{ $paquete->paquete }}</td>
            <td>{{ $paquete->descripcion }}</td>
            <td>{{ $paquete->precio }}</td>
            <td>{{ $paquete->activo == 1 ? "Si" : "No"}}</td>
            <td>{{ $paquete->eventos}}</td>
            <td>{{ $paquete->created_at}}</td>
            <td>
                <a class="btn btn-info" href="{{ route('paquetes.show',$paquete->id) }}">Mostrar</a>
                
                 @if(Auth::user()->role == 'gerente')
                      <a class="btn btn-primary" href="{{ route('paquetes.edit',$paquete->id) }}">Editar</a>
                <form action="{{ route('paquetes.destroy',$paquete->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <a class="btn btn-warning " href="{{ route('fotos.create',$paquete->id) }}">Agregar fotos</a>   
                    @else
                       <span></span>
                      @endif  
                <a class="btn btn-outline-dark" href="{{ route('paquetes_eventos.create',$paquete->id) }}">Adquirir Paquete</a>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection