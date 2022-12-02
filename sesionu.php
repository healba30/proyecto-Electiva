<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuariolg'];

if ($varsesion == null || $varsesion = '') {
    echo 'TRAMPOSO USTED NO EXISTE';
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion de usuario</title>
</head>
<body>
    
<h1>BIENVENIDO
</h1>
<a href="cerrar.php">Cerrar sesion</a>

</body>
</html>