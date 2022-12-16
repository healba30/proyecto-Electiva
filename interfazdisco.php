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
        <title>Agregar Discotecas</title>
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
                            <a href="mapaadmin.php" target="blank">Ir al mapa</a>
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
                        <a href="interfazhotel.php">Hoteles</a>
                        <a href="interfazrestaurante.php">Restaurantes</a>
                        <a href="interfazdisco.php">Discotecas</a>
                        <a href="interfazusuarios.php">Usuarios</a>
                    </nav>
                    <label for="btn-menu">✖️</label>
                </div>
            </div>

            <div class="containerr">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese los datos</h1>
                            <h2>Tabla de discotecas</h2>
                                <form action="insertarD.php" method="POST" class="form" id="form">

                                    <input type="text" class="form-control mb-3" name="cod_dis" id="cod_dis" placeholder="Cod disco">
                                    <input type="text" class="form-control mb-3" name="telefono2" id="telefono2" placeholder="Telefono">
                                    <input type="text" class="form-control mb-3" name="nombre2" id="nombre2" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="direccion2" id="direccion2" placeholder="Direccion">
                                    <label for="">Estrellas</label>
                                    <select name="calificacion2" id="calificacion2">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" name="coordenada2" id="coordenada2" placeholder="Coordenada">
                                    
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
                                        <th>Estrellas</th>
                                        <th>Direccion</th>
                                        <th>Coordenada</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php

                                        $sqli="SELECT * FROM discotecas";
                                        $result=mysqli_query($conectar,$sqli);

                                        while ($mostrar=mysqli_fetch_array($result)) {
                                            
                                        ?>
                                            <tr>
                                                <th><?php  echo $mostrar['cod_dis']?></th>
                                                <th><?php  echo $mostrar['telefono2']?></th>
                                                <th><?php  echo $mostrar['nombre2']?></th>
                                                <th><?php  echo $mostrar['calificacion2']?></th>
                                                <th><?php  echo $mostrar['direccion2']?></th> 
                                                <th><?php  echo $mostrar['coordenada2']?></th>    
                                                <th><a href="actualizarD.php?id=<?php echo $mostrar['cod_dis'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteD.php?id=<?php echo $mostrar['cod_dis'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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
    url: 'insertarD.php',
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

$("#telefono2").on("focusout",function() {
        
        const tel = document.getElementById("telefono2")
            
        if (tel.value.length >= 0) {
    
              $.ajax({
              url: 'verificaciontelD.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#cod_dis").attr('disabled',true); //Desabilito el campo del codigo
                      $("#calificacion2").attr('disabled',true); //Desabilito el campo del codigo
                      $("input#nombre2").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion2").attr('disabled',true); //Desabilito el campo de correo
                      $("input#coordenada2").attr('disabled',true); //Desabilito el campo de la coordenada
                      alert("Este telefono ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    $("input#cod_dis").attr('disabled',false); //Habilito el input nombre
                    $("#calificacion2").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre2").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion2").attr('disabled',false); //Habilito el campo de correo
                    $("input#coordenada2").attr('disabled',false); //Desabilito el campo de correo
                }
            }          
    
        });
        
    
        } 
            
        });

$("#cod_dis").on("focusout",function() {
        
        const codd = document.getElementById("cod_dis")
            
        if (codd.value.length >= 0) {
    
              $.ajax({
              url: 'verificacioncodD.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#telefono2").attr('disabled',true); //Desabilito el campo del codigo
                    $("#calificacion2").attr('disabled',true); //Habilito el input nombre
                      $("input#nombre2").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion2").attr('disabled',true); //Desabilito el campo de correo
                      $("input#coordenada2").attr('disabled',true); //Desabilito el campo de la coordenada
                      alert("Este telefono ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    $("input#telefono2").attr('disabled',false); //Habilito el input nombre
                    $("#calificacion2").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre2").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion2").attr('disabled',false); //Habilito el campo de correo
                    $("input#coordenada2").attr('disabled',false); //Desabilito el campo de correo
                }
            }          
    
        });
        
    
        } 
            
        });

    </script>


</html>