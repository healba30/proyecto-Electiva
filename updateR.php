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

$sql1="UPDATE restaurantes SET  telefono1='$telefono1',nombre1='$nombre1',direccion1='$direccion1' WHERE cod_res='$cod_res'";
$query1=mysqli_query($conectar,$sql1);

}
?>