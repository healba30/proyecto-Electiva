<?php

include_once('db.php');
$conectar = conn();

$cod=$_POST['cod'];
$telefono=$_POST['telefono'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$coordenada=$_POST['coordenada'];

if ($cod == '' || $nombre == '' ||
$direccion == '' || $coordenada == '') {

echo 1;

}else{

$sql1="UPDATE lugares SET  telefono='$telefono',nombre='$nombre',direccion='$direccion',coordenada='$coordenada' WHERE cod='$cod'";
$query1=mysqli_query($conectar,$sql1);

}
?>