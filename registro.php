<?php

include_once('db.php');
//hacemos llamado al imput de formuario
$nombres = $_POST['nombres'] ;
$usuarios = $_POST['usuarios'] ;
$correo = $_POST['correo'] ;
$clave = md5($_POST['clave']) ;
$tipo_u = "Usuario";

$conectar = conn();
  
    $sql="INSERT INTO usuarios(nombres, usuarios, correo, clave, tipo_u) 
    VALUES ('$nombres', '$usuarios', '$correo' , '$clave', '$tipo_u')";
    $resul = mysqli_query($conectar , $sql)or trigger_error("Query failed! SQL - ERROR: " .mysqli_error($conectar), E_USER_ERROR);



?>
