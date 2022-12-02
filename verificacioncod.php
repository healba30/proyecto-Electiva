<?php

include_once('db.php');
$cod_res = $_POST['cod_res'] ;

$conectar = conn();

$sql1 = "SELECT * FROM restaurantes WHERE cod_res = '$cod_res'";
$resultado = $conectar->query($sql1);
$fila = mysqli_num_rows($resultado);

if ($fila<=0) {
    
    echo 0;

} else {

    echo 1;

}

?>