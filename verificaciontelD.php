<?php

include_once('db.php');
$telefono2 = $_POST['telefono2'] ;

$conectar = conn();

$sql1 = "SELECT * FROM discotecas WHERE telefono2 = '$telefono2'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}


?>