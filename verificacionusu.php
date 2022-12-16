<?php

include_once('db.php');
$usuarios = $_POST['usuarios'] ;

$conectar = conn();

$sql1 = "SELECT * FROM usuarios WHERE usuarios = '$usuarios'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}

?>