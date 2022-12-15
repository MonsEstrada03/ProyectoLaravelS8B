<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
 <nav class="navbar navbar-light bg-light">
  <form class="container-fluid justify-content-start">
    @if(Auth::user()->role == 'gerente') 
    {{-- <a href="{{ route('eventos.index') }}" button class="btn btn-outline-success me-2" type="button">Eventos</button></a> --}}
    {{-- <a href="{{ route('paquetes.index') }}" button class="btn btn-outline-success me-2" type="button">Paquetes</button></a> --}}
    <a href="{{ route('usuarios.index') }}" button class="btn btn-outline-success me-2" type="button">Usuarios</button></a>
    <a href="{{ route('servicios.index') }}" button class="btn btn-outline-success me-2" type="button">Servicios</button></a>
    <a href="{{ route('abonos.index') }}" button class="btn btn-outline-success me-2" type="button">Abono</button></a>
    @endif
    <a href="{{ route('paquetes.index') }}" button class="btn btn-outline-success me-2" type="button">Paquetes</button></a>
    <a href="{{ route('eventos.index') }}" button class="btn btn-outline-success me-2" type="button">Eventos</button></a>
    <a href="{{ route('login.destroy') }}" button class="btn btn-outline-success me-2" type="button">Cerrar Sesion</button></a>
  </form>
</nav>
</body>
</html>