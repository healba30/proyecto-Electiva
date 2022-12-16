<?php

include_once('db.php');
$conectar = conn();

$cod_dis=$_GET['id'];

$sql="DELETE FROM discotecas  WHERE cod_dis='$cod_dis'";
$query=mysqli_query($conectar,$sql);

    if($query){
        Header("Location: interfazdisco.php");
    }
?>