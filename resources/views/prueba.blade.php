<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">

    <title>Relaciones</title>
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <div class= "container mt-4">
        <div class= "row justify-content-center">
            <div class="col-auto">
              <h3> Paquete <span class= "badge bg-secondary"> {{$paquete->paquete}}</span> Tiene los servicios: </h3>
              
              <table class="table table-striped table-hover">
                  <thead class= "bg-primary text-white">
                    <th>PAQUETES</th>
                  </thead>
                  <tbody>
                      @foreach ($paquete->servicio as $registro)
                          <tr>
                            <td> {{$registro->paquete}}</td>
                          </tr>
                      @endforeach
                  </tbody>

              </table>
            </div>
        </div>
    </div>
   
  </body>
</html>