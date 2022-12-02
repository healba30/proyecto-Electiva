<?php

include_once('db.php');
$telefono1 = $_POST['telefono1'] ;

$conectar = conn();

$sql1 = "SELECT * FROM restaurantes WHERE telefono1 = '$telefono1'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}


?>