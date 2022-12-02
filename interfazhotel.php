<?php 

session_start();
error_reporting(0);
$varsesion = $_SESSION['usuariolg'];

if ($varsesion == null || $varsesion = '') {
    echo 'TRAMPOSO USTED NO ES EL ADMINISTRADOR';
    die();
}else{
    include_once('db.php');
    $conectar = conn();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Agregar hoteles</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/descarga-assets/Captura.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">      
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>

                <header class="header">
                    <div class="container">
                    <div class="btn-menu">
                        <label for="btn-menu">☰</label>
                    </div>
                        <div class="logo">
                            <h1>Menu</h1>
                        </div>
                        <nav class="menu">
                            <a href="inicioadmin.php">Inicio</a>
                            <a href="cerrar.php">Cerrar sesión</a>
                        </nav>
                    </div>
                </header>
                <div class="capa"></div>
            <!--	--------------->
            <input type="checkbox" id="btn-menu">
            <div class="container-menu">
                <div class="cont-menu">
                    <nav>
                        <a href="interfazadmin.php">Hoteles</a>
                        <a href="interfazrestaurante.php">Restaurantes</a>
                        <a href="#">Discotecas</a>
                        <a href="interfazusuarios.php">Usuarios</a>
                    </nav>
                    <label for="btn-menu">✖️</label>
                </div>
            </div>

            <div class="containerr">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese los datos</h1>
                            <h2>Tabla de hoteles</h2>
                                <form action="insertar.php" method="POST" class="form" id="form">

                                    <input type="text" class="form-control mb-3" name="cod_hotel" placeholder="Cod hotel">
                                    <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono">
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="direccion" placeholder="Direccion">
                                    
                                    <input type="submit" class="btn btn-primary" id="Agregar" value="Agregar">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Telefono</th>
                                        <th>Nombre</th>
                                        <th>Direccion</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php

                                        $sqli="SELECT * FROM hoteles";
                                        $result=mysqli_query($conectar,$sqli);

                                        while ($mostrar=mysqli_fetch_array($result)) {
                                            
                                        ?>
                                            <tr>
                                                <th><?php  echo $mostrar['cod_hotel']?></th>
                                                <th><?php  echo $mostrar['telefono']?></th>
                                                <th><?php  echo $mostrar['nombre']?></th>
                                                <th><?php  echo $mostrar['direccion']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $mostrar['cod_hotel'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $mostrar['cod_hotel'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
            <script src="codigo.js"></script>
    </body>

    <script>

$("#Agregar").click(function() {
    
    $.ajax({
    url: 'insertar.php',
    type: 'POST',
    data: $('#form').serialize(),

    success: function(res1){

        if (res1==1) {

           
            alert("Hay campos vacíos");
            
        
      } 
      else{

          location.reload();

      }
  }          

});           
});

    </script>


</html>