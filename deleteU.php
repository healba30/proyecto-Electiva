<?php

include_once('db.php');
$conectar = conn();

$cod_usu=$_GET['id'];

$sql1="DELETE FROM usuarios  WHERE id='$cod_usu'";
$query1=mysqli_query($conectar,$sql1);

    if($query1){
        Header("Location: interfazusuarios.php");
    }
?>