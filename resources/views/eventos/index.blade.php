@extends('fotos.layout')
@extends('gerente.gerente')
 
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>EVENTOS</h2>
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
            <th>Usuario_Id</th>
            <th>Fecha Evento</th>
            <th>Hora de inicio</th>
            <th>Hora Final</th>
            <th>Proposito</th>
            <th>Invitado</th>
            <th>Confirmado</th>
            <th>Realizado</th>
            <th>Fecha</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($eventos as $evento)
        <tr>
            <td>{{ $evento->id }}</td>
            <td>{{ $evento->usuario_id }}</td>
            <td>{{ $evento->fecha }}</td>
            <td>{{ $evento->hora_inicio }}</td>
            <td>{{ $evento->hora_final }}</td>
            <td>{{ $evento->proposito }}</td>
            <td>{{ $evento->invitados }}</td>
            <td>{{ $evento->confirmado == 1 ? "Si" : "No"}}</td>
            <td>{{ $evento->realizado == 1 ? "Si" : "No"}}</td>
            <td>{{ $evento->created_at}}</td>
            <td>
                <form action="{{ route('eventos.destroy',$evento->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('eventos.show',$evento->id) }}">Mostrar</a>
                    
                    @if(Auth::user()->role == 'cliente' && $evento->confirmado==1)
                        <span></span>
                    @else
                        <a 
                        class="btn btn-primary"
                        href="{{ route('eventos.edit',$evento->id) }}">
                            Editar
                        </a>
                      @endif  
                    @if(Auth::user()->role == 'cliente' && $evento->confirmado==1)
                        <span></span>
                    @else
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    @endif
                    @if ( $evento->confirmado==1)
                         <a 
                        class="btn btn-dark"
                        href="{{ route('abonos.create',$evento->id) }}">
                            Abonos
                        </a>
                        <a class="btn btn-warning " href="{{ route('fotos.create',$evento->id) }}">Agregar fotos</a>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection