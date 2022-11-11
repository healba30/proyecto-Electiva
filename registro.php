<?php

include_once('db.php');
//hacemos llamado al imput de formuario
$nombres = $_POST['nombres'] ;
$correo = $_POST['correo'] ;
$clave = $_POST['clave'] ;


$conectar = conn();
$sql="INSERT INTO usuarios(nombres, correo, clave) 
VALUES ('$nombres', '$correo', '$clave')";

$resul = mysqli_query($conectar , $sql)or trigger_error("Query failed! SQL - ERROR: " .mysqli_error($conectar), E_USER_ERROR);



?>