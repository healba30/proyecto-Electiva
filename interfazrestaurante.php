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
        <title> Agregar restaurantes</title>
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
                        <a href="interfazhotel.php">Hoteles</a>
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
                            <h2>Tabla de restaurantes</h2>
                                <form action="insertarR.php" method="POST" class="form" id="form">

                                    <input type="text" class="form-control mb-3" name="cod_res" id="cod_res" placeholder="Cod restaurante">
                                    <input type="text" class="form-control mb-3" name="telefono1" id="telefono1" placeholder="Telefono">
                                    <input type="text" class="form-control mb-3" name="nombre1" id="nombre1" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="direccion1" id="direccion1" placeholder="Direccion">
                                    
                                    <input type="submit" class="btn btn-primary" id="Agregar" value="Agregar">
                                    <p class="warnings" id="warnings"></p>
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

                                        $sqli="SELECT * FROM restaurantes";
                                        $result=mysqli_query($conectar,$sqli);

                                        while ($mostrar=mysqli_fetch_array($result)) {
                                            
                                        ?>
                                            <tr>
                                                <th><?php  echo $mostrar['cod_res']?></th>
                                                <th><?php  echo $mostrar['telefono1']?></th>
                                                <th><?php  echo $mostrar['nombre1']?></th>
                                                <th><?php  echo $mostrar['direccion1']?></th>    
                                                <th><a href="actualizarR.php?id=<?php echo $mostrar['cod_res'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteR.php?id=<?php echo $mostrar['cod_res'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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
              url: 'insertarR.php',
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

$("#telefono1").on("focusout",function() {
        
        const tel = document.getElementById("telefono1")
        let warnings = ""
        let entrar1 = false  
        let entrar3 = false
            
        if (tel.value.length >= 0) {
    
              $.ajax({
              url: 'verificaciontel.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#cod_res").attr('disabled',true); //Desabilito el campo de contraseña
                      $("input#nombre1").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion1").attr('disabled',true); //Desabilito el campo de correo
                      alert("Este telefono ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    $("input#cod_res").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre1").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion1").attr('disabled',false); //Habilito el campo de correo

                }
            }          
    
        });
        
    
        } 
            
        });


$("#cod_res").on("focusout",function() {
        
        const cod = document.getElementById("cod_res")
        let warnings = ""
        let entrar1 = false  
        let entrar3 = false
            
        if (cod.value.length >= 0) {
    
              $.ajax({
              url: 'verificacioncod.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#telefono1").attr('disabled',true); //Desabilito el campo de contraseña
                      $("input#nombre1").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#direccion1").attr('disabled',true); //Desabilito el campo de correo
                      alert("Este codigo ya existe en la base de datos");
                  
                } 
                else{
    
                    $("input#Agregar").attr('disabled',false); //Habilito el Botton
                    $("input#telefono1").attr('disabled',false); //Habilito el input nombre
                    $("input#nombre1").attr('disabled',false); //Habilito el campo de nombre
                    $("input#direccion1").attr('disabled',false); //Habilito el campo de correo

                }
            }          
    
        });
        
    
        } 
            
        });

    </script>


</html>