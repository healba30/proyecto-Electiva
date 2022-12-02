<?php
include_once('db.php');
$conectar = conn();

$cod_res=$_POST['cod_res'];
$telefono1=$_POST['telefono1'];
$nombre1=$_POST['nombre1'];
$direccion1=$_POST['direccion1'];

if ($cod_res == '' || $telefono1 == '' || $nombre1 == '' ||
$direccion1 == '') {

echo 1;

}else{

$sql1="INSERT INTO restaurantes VALUES('$cod_res','$telefono1','$nombre1','$direccion1')";
$query1= mysqli_query($conectar,$sql1);

}

?>