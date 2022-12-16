<?php

include_once('db.php');
$conectar = conn();

$cod_dis=$_POST['cod_dis'];
$telefono2=$_POST['telefono2'];
$nombre2=$_POST['nombre2'];
$direccion2=$_POST['direccion2'];
$coordenada2=$_POST['coordenada2'];

if ($cod_dis == '' || $telefono2 == '' || $nombre2 == '' ||
$direccion2 == '' || $coordenada2 == '') {

echo 1;

}else{

$sql1="UPDATE discotecas SET  telefono2='$telefono2',nombre2='$nombre2',direccion2='$direccion2',coordenada2='$coordenada2' WHERE cod_dis='$cod_dis'";
$query1=mysqli_query($conectar,$sql1);

}
?>