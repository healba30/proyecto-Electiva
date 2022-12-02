<?php
include_once('db.php');
$conectar = conn();

$cod_hotel=$_POST['cod_hotel'];
$telefono=$_POST['telefono'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];

if ($cod_hotel == '' || $telefono == '' || $nombre == '' ||
$direccion == '') {

echo 1;

}else{

$sql="INSERT INTO hoteles VALUES('$cod_hotel','$telefono','$nombre','$direccion')";
$query= mysqli_query($conectar,$sql);

}
?>