<?php

include_once('db.php');
$conectar = conn();

$cod_res=$_GET['id'];

$sql1="DELETE FROM restaurantes  WHERE cod_res='$cod_res'";
$query1=mysqli_query($conectar,$sql1);

    if($query1){
        Header("Location: interfazrestaurante.php");
    }
?>