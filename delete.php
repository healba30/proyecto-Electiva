<?php

include_once('db.php');
$conectar = conn();

$cod=$_GET['id'];

$sql="DELETE FROM lugares  WHERE cod='$cod'";
$query=mysqli_query($conectar,$sql);

    if($query){
        Header("Location: interfazhotel.php");
    }
?>