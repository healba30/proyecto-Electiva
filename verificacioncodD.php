<?php

include_once('db.php');
$cod_dis = $_POST['cod_dis'] ;

$conectar = conn();

$sql1 = "SELECT * FROM discotecas WHERE cod_dis = '$cod_dis'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}

?>