<?php

include_once('db.php');
$conectar = conn();

$cod_hotel=$_POST['cod_hotel'];
$telefono=$_POST['telefono'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];

$sql="UPDATE hoteles SET  telefono='$telefono',nombre='$nombre',direccion='$direccion' WHERE cod_hotel='$cod_hotel'";
$query=mysqli_query($conectar,$sql);

    if($query){
        Header("Location: interfazhotel.php");
    }
?>