<?php
session_start();
$usuariolg = $_POST['usuariolg'];
$passlg = $_POST['passlg'];

$_SESSION['usuariolg'] = $usuariolg;
$_SESSION['passlg'] = $passlg;

require 'db.php';
$conectar = conn();
$usuarios = $conectar->query("SELECT nombres, tipo_u
FROM usuarios
WHERE usuarios = '".$usuariolg."'
AND clave = '".$passlg."'");


if ($usuarios->num_rows > 0) {
    $datos = $usuarios->fetch_assoc();
    echo json_encode(array('error' => false, 'tipo' => $datos['tipo_u']));
}
else {
    echo json_encode(array('error' => true));
}


?>