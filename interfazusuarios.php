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
        <link rel="stylesheet" type="text/css" href="css/estilos1.css">      
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
                        <a href="interfazlugares.php">Lugares</a>
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
                            <h2>Tabla de usuarios</h2>
                                <form action="insertarU.php" method="POST" class="form" id="form">

                                    <input type="text" class="form-control mb-3" name="id" id="ID" placeholder="ID">
                                    <input type="text" class="form-control mb-3" name="nombres" id="name" placeholder="Nombres">
                                    <input type="text" class="form-control mb-3" name="usuarios" id="users" placeholder="Usuarios">
                                    <input type="text" class="form-control mb-3" name="correo" id="email" placeholder="Correo electronico">
                                    <input type="text" class="form-control mb-3" name="clave" id="password" placeholder="Contraseña">
                                    <select name="tipo_u" id="tipo_u">
                                        <option value="Usuario">Usuario</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary" id="Agregar" value="Agregar">
                                    <p class="warnings" id="warnings"></p>
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombres</th>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Clave</th>
                                        <th>Tipo de usuario</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php

                                        $sqli="SELECT * FROM usuarios";
                                        $result=mysqli_query($conectar,$sqli);

                                        while ($mostrar=mysqli_fetch_array($result)) {
                                            
                                        ?>
                                            <tr>
                                                <th><?php  echo $mostrar['id']?></th>
                                                <th><?php  echo $mostrar['nombres']?></th>
                                                <th><?php  echo $mostrar['usuarios']?></th>
                                                <th><?php  echo $mostrar['correo']?></th>
                                                <th><?php  echo $mostrar['clave']?></th>  
                                                <th><?php  echo $mostrar['tipo_u']?></th>    
                                                <th><a href="actualizarU.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="deleteU.php?id=<?php echo $mostrar['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
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
        
        const ID = document.getElementById("ID")

              $.ajax({
              url: 'insertarU.php',
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

$("#ID").on("focusout",function() {
        
        const ID = document.getElementById("ID")
            
        if (ID.value.length >= 0) {
    
              $.ajax({
              url: 'verificacionid.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#name").attr('disabled',true); //Desabilito el campo de contraseña
                      $("input#users").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#email").attr('disabled',true); //Desabilito el campo de correo
                      $("input#password").attr('disabled',true); //Desabilito el campo de correo
                      $("#tipo_u").attr('disabled',true); //Desabilito el campo de correo
                      alert("Este id ya existe en la base de datos");    
                } 
                else{
    
                      $("input#Agregar").attr('disabled',false); //Desabilito el Botton
                      $("input#name").attr('disabled',false); //Desabilito el campo de contraseña
                      $("input#users").attr('disabled',false); //Desabilito el campo de nombre
                      $("input#email").attr('disabled',false); //Desabilito el campo de correo
                      $("input#password").attr('disabled',false); //Desabilito el campo de correo
                      $("#tipo_u").attr('disabled',false); //Desabilito el campo de correo
                }
            }         
        });
        }         
        });

$("#users").on("focusout",function() {
        
        const usu = document.getElementById("users")
        
        if (usu.value.length >= 0) {
    
              $.ajax({
              url: 'verificacionusu.php',
              type: 'POST',
              data: $('#form').serialize(),
    
              success: function(res1){
    
                  if (res1==1) {
    
                      $("input#Agregar").attr('disabled',true); //Desabilito el Botton
                      $("input#name").attr('disabled',true); //Desabilito el campo de contraseña
                      $("input#ID").attr('disabled',true); //Desabilito el campo de nombre
                      $("input#email").attr('disabled',true); //Desabilito el campo de correo
                      $("input#password").attr('disabled',true); //Desabilito el campo de correo
                      $("#tipo_u").attr('disabled',true); //Desabilito el campo de correo
                      alert("Este usuario ya existe en la base de datos");                 
                } 
                else{
    
                      $("input#Agregar").attr('disabled',false); //Desabilito el Botton
                      $("input#name").attr('disabled',false); //Desabilito el campo de contraseña
                      $("input#ID").attr('disabled',false); //Desabilito el campo de nombre
                      $("input#email").attr('disabled',false); //Desabilito el campo de correo
                      $("input#password").attr('disabled',false); //Desabilito el campo de correo
                      $("#tipo_u").attr('disabled',false); //Desabilito el campo de correo
                }
            }          
        });
        }       
        });

    </script>

</html>