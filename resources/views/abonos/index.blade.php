@extends('abonos.layout')
@extends('gerente.gerente')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Abonos</h2>
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
            <th>Evento_Id</th>
            <th>Usuario_Id</th>
            <th>Paquete_Id</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($abonos as $abono)
        <tr>
            <td>{{ $abono->id }}</td>
            <td>{{ $abono->evento_id }}</td>
            <td>{{ $abono->usuario_id  }}</td>
            <td>{{ $abono->paquete_id}}</td>
            <td>{{ $abono->monto }}</td>
            <td>{{ $abono->created_at}}</td>
            <td>
                <form action="{{ route('abonos.destroy',$abono->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('abonos.show',$abono->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('abonos.edit',$abono->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection