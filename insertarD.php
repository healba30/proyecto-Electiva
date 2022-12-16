<?php
include_once('db.php');
$conectar = conn();

$cod_dis=$_POST['cod_dis'];
$telefono2=$_POST['telefono2'];
$nombre2=$_POST['nombre2'];
$calificacion2=$_POST['calificacion2'];
$direccion2=$_POST['direccion2'];
$coordena2=$_POST['coordenada2'];

if ($cod_dis == '' || $telefono2 == '' || $nombre2 == '' ||
$direccion2 == '' || $coordena2 == '') {

echo 1;

}else{

$sql="INSERT INTO discotecas VALUES('$cod_dis','$telefono2','$nombre2','$calificacion2','$direccion2','$coordena2')";
$query= mysqli_query($conectar,$sql);

}
?>