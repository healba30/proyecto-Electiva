<?php

$nombrecoor = $_POST['coordenada'];

require 'db.php';
$conectar = conn();
$usuarios = $conectar->query("SELECT nombre, coordenada
FROM hoteles
WHERE nombre = '".$nombrecoor."'");


if ($usuarios->num_rows > 0) {
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['coordenada']));
    
}
else {
    echo json_encode(array('error' => true));
}


?>