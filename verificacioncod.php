<?php

include_once('db.php');
$cod = $_POST['cod'] ;

$conectar = conn();

$sql1 = "SELECT * FROM lugares WHERE cod = '$cod'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}

?>