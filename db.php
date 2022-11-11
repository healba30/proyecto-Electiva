<?php

    function conn(){

        $servidor = 'localhost';
        $usuario = 'root';
        $passwd = '';
        $basedatos = 'proyecto';
        $port = 3307;
    
        $conectar = mysqli_connect($servidor, $usuario, $passwd, $basedatos, $port);
        return $conectar;

    }

?>