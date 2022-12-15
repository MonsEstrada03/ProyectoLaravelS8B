<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bootstrap Example</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
  <body class="p-3 m-0 border-0 bd-example">
    
  {{-- <ul class="nav nav-pills nav-fill">
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><h1> <center> Bienvenidos </center> </h1></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login.destroy') }}">Cerrar sesion</a>
      </li>
    </ul> --}}
    <!-- enlaces -->

    <div class="container">
        <br>
    <div class="row">
       
            <div class="col-3">
                <div class=" card">
                    <img
                    title="Titulo producto"
                    alt="Titulo"
                    Class="Card-img-top"
                    background-color: #5f6769;
                    src="https://www.salonkiddieland.com/wp-content/uploads/2020/02/fiestaskiddi.jpg"
                    > 
                    <div>
                    <form action="cliente.php" method="POST">
                        <span>fiesta infantil</span>
                        <h5>$10,000</h5> 
                        <p> Disfruta de una increible fiesta especialmente para niños</p> 
                            <input type="hidden" name="title" value="fiesta infantil">
                            <input type="hidden" name="price" value="10,000">
                            <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="Agregar" 
                            type="submit"
                            >
                            Adquirir paquete
                            </button>
                             
                        </form>
                        
                    </div>       
                </div>     
            </div>
            <div class="col-3">
                <div class=" card">
                    <img
                    title="Titulo producto"
                    alt="Titulo"
                    Class="Card-img-top"
                    src="https://cdn0.bodas.com.mx/article/9998/3_2/960/jpg/48999-mx.jpeg"
                    > 
                    <div>
                    <form action="cliente.php" method="POST">
                        <span>Boda especialmente para ti</span>
                        <h5>$30,600</h5> 
                        <p> Vive la boda que siempre has soñado en uno de nuestros destinos de Playa</p> 
                            <input type="hidden" name="title" value="Boda">
                            <input type="hidden" name="price" value="30,000">
                            <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="Agregar" 
                            type="submit"
                            >
                            Adquirir paquete
                            </button>
                             
                        </form>
                        
                    </div>       
                </div>     
            </div>
            <div class="col-3">
                <div class=" card">
                    <img
                    title="Titulo producto"
                    alt="Titulo"
                    Class="Card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQajlBvRpdpcX5e0QKMzDvldU3PusNw0lZLtQ&usqp=CAU"
                    > 
                    <div>
                    <form action="cliente.php" method="POST">
                        <span>Xv años </span>
                        <h5>$15,000</h5> 
                        <p>Consiente a tu princesa de forma maravillosa en un jardín de fiestas.</p> 
                            <input type="hidden" name="title" value="quince años ">
                            <input type="hidden" name="price" value="15,000">
                            <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="Agregar" 
                            type="submit"
                            >
                            Adquirir paquete
                            </button>
                             
                        </form>
                        
                    </div>       
                </div>     
            </div>
            <div class="col-3">
                <div class=" card">
                    <img
                    title="Titulo producto"
                    alt="Titulo"
                    Class="Card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGBnhtsfpY1tKAAQpnzhf_8-jHW4zMbEYkrA&usqp=CAU"
                    > 
                    <div>
                    <form action="cliente.php" method="POST">
                        <span>Bautizo</span>
                        <h5>$20,000</h5> 
                        <p>ofrece de manera integral todo lo necesario para llevar a cabo el evento</p> 
                            <input type="hidden" name="title" value="bautizo">
                            <input type="hidden" name="price" value="20,000">
                            <button class="btn btn-primary" 
                            name="btnAccion" 
                            value="Agregar" 
                            type="submit"
                            >
                           Adquirir paquete
                            </button>
                             
                        </form>
                        
                    </div>       
                </div>     
            </div>
        </div>
        
    </div>
</body>
</html>