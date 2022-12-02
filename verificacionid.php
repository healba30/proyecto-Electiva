<?php

include_once('db.php');
$id = $_POST['id'] ;

$conectar = conn();

$sql1 = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}

?>