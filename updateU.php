<?php

include_once('db.php');
$conectar = conn();

$id=$_POST['id'];
$nombres=$_POST['nombres'];
$usuarios=$_POST['usuarios'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$tipo_u=$_POST['tipo_u'];

$sql1="UPDATE usuarios SET  nombres='$nombres',usuarios='$usuarios',correo='$correo',clave='$clave',tipo_u='$tipo_u' WHERE id='$id'";
$query1=mysqli_query($conectar,$sql1);

    if($query1){
        Header("Location: interfazusuarios.php");
    }
?>