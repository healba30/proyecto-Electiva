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
        <title>Agregar lugares</title>
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
                        <a href="interfazhotel.php">Lugares</a>
                        <a href="interfazrestaurante.php">Lugares laravel</a>
                        <a href="interfazusuarios.php">Usuarios</a>
                    </nav>
                    <label for="btn-menu">✖️</label>
                </div>
            </div>

            <div class="containerr">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese los datos</h1>
                            <h2>Tabla de lugares</h2>
                                <form action="insertar.php" method="POST" class="form" id="form">

                                    
                                    <label for="">Tipo</label>
                                    <select name="tipo_lugar" id="tipo_lugar">
                                        <option value="Hotel">Hotel</option>
                                        <option value="Restaurante">Restaurante</option>
                                        <option value="Discotecas">Discoteca</option>
                                        <option value="Balniarios">Balniario</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" name="telefono" id="telefono" placeholder="Telefono">
                                    <input type="text" class="form-control mb-3" name="nombre" id="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="direccion" id="direccion" placeholder="Direccion">
                                    <label for="">Estrellas</label>
                                    <select name="calificacion" id="calificacion">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <input type="text" class="form-control mb-3" name="coordenada" id="coordenada" placeholder="Coordenada">
                                    
                                    <input type="submit" class="btn btn-primary" id="Agregar" value="Agregar">
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Código</th>
                                        <th>Tipo</th>
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

                                        $sqli="SELECT * FROM lugares";
                                        $result=mysqli_query($conectar,$sqli);

                                        while ($mostrar=mysqli_fetch_array($result)) {
                                            
                                        ?>
                                            <tr>
                                                <th><?php  echo $mostrar['cod']?></th>
                                                <th><?php  echo $mostrar['tipo_lugar']?></th>
                                                <th><?php  echo $mostrar['telefono']?></th>
                                                <th><?php  echo $mostrar['nombre']?></th>
                                                <th><?php  echo $mostrar['calificacion']?></th>
                                                <th><?php  echo $mostrar['direccion']?></th> 
                                                <th><?php  echo $mostrar['coordenada']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $mostrar['cod'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $mostrar['cod'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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

$("#telefono").on("focusout",function() {
        
        const tel = document.getElementById("telefono")
            
        if (tel.value.length >= 0) {
    
              $.ajax({
              url: 'verificaciontel.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      
                      $("input#tipo_lugar").attr('disabled',true); //Desabilito el campo del codigo
                      $("#calificacion").attr('disabled',true); //Desabilito el campo del codigo
                      $("input#nombre").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion").attr('disabled',true); //Desabilito el campo de correo
                      $("input#coordenada").attr('disabled',true); //Desabilito el campo de la coordenada
                      alert("Este telefono ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    
                    $("input#tipo_lugar").attr('disabled',false); //Habilito el input nombre
                    $("#calificacion").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion").attr('disabled',false); //Habilito el campo de correo
                    $("input#coordenada").attr('disabled',false); //Desabilito el campo de correo
                }
            }          
    
        });
        
    
        } 
            
        });

$("#cod").on("focusout",function() {
        
        const codh = document.getElementById("cod")
            
        if (codh.value.length >= 0) {
    
              $.ajax({
              url: 'verificacioncod.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#telefono").attr('disabled',true); //Desabilito el campo del codigo
                      $("input#tipo_lugar").attr('disabled',true); //Desabilito el campo del codigo
                      $("#calificacion").attr('disabled',true); //Habilito el input nombre
                      $("input#nombre").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion").attr('disabled',true); //Desabilito el campo de correo
                      $("input#coordenada").attr('disabled',true); //Desabilito el campo de la coordenada
                      alert("Este telefono ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    $("input#telefono").attr('disabled',false); //Habilito el input nombre
                    $("input#tipo_lugar").attr('disabled',false); //Habilito el input nombre
                    $("#calificacion").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion").attr('disabled',false); //Habilito el campo de correo
                    $("input#coordenada").attr('disabled',false); //Desabilito el campo de correo
                }
            }          
    
        });
        
    
        } 
            
        });

    </script>


</html>