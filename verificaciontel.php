<?php

include_once('db.php');
$telefono = $_POST['telefono'] ;

$conectar = conn();

$sql1 = "SELECT * FROM lugares WHERE telefono = '$telefono'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}


?>