<?php   
    function conexion() {
        $servidor = 'localhost';
        $cuenta = 'root';
        $password = '';
        $bd = 'truenews';
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);
        if ($conexion->connect_errno) {
            die('Error en la conexion');
        } else {
            echo 'Conexion exitosa';
            return $conexion;
        }
    }
?>