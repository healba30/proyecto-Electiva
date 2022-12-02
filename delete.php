<?php

include_once('db.php');
$conectar = conn();

$cod_hotel=$_GET['id'];

$sql="DELETE FROM hoteles  WHERE cod_hotel='$cod_hotel'";
$query=mysqli_query($conectar,$sql);

    if($query){
        Header("Location: interfazhotel.php");
    }
?>