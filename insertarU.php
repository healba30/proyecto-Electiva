<?php
include_once('db.php');
$conectar = conn();

$id=$_POST['id'];
$nombres=$_POST['nombres'];
$usuarios=$_POST['usuarios'];
$correo=$_POST['correo'];
$clave=$_POST['clave'];
$tipo_u=$_POST['tipo_u'];

if ($nombres == '' || $usuarios == '' || $id == '' ||
$correo == '' || $clave == '') {

echo 1;

}else{

    $sql1="INSERT INTO usuarios VALUES('$id','$nombres','$usuarios','$correo','$clave','$tipo_u')";
    $query1= mysqli_query($conectar,$sql1);
    

}
?>