<?php
include_once('db.php');
$conectar = conn();


$tipo_lugar=$_POST['tipo_lugar'];
$telefono=$_POST['telefono'];
$nombre=$_POST['nombre'];
$calificacion=$_POST['calificacion'];
$direccion=$_POST['direccion'];
$coordenada=$_POST['coordenada'];

if ($telefono == '' || $nombre == '' ||
$direccion == '' || $coordenada == '') {

echo 1;

}else{

    $sql="INSERT INTO lugares(tipo_lugar, telefono, nombre, calificacion, direccion, coordenada) 
    VALUES ('$tipo_lugar', '$telefono', '$nombre' , '$calificacion', '$direccion', '$coordenada')";
    $resul = mysqli_query($conectar , $sql)or trigger_error("Query failed! SQL - ERROR: " .mysqli_error($conectar), E_USER_ERROR);

}
?>