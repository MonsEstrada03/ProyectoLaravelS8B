@extends('usuarios.layout')
@extends('gerente.gerente')
  
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD Usuarios</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Crear Usuario</a>
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
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Fecha</th>
            <th>Eventos</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($usuarios as $usuario)
        <tr>
        
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->password }}</td>
            <td>{{ $usuario->role}}</td>
            <td>{{ $usuario->created_at}}</td>
            <td>{{ $usuario->eventos}}</td>
            <td>
                <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('usuarios.show',$usuario->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>
   
                    @if ( $usuario->eventos==0)
                        @csrf
                        @method('DELETE')
      
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    @endif
                    
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection