<?php   
    function conexion() {
        $servidor = '127.0.0.1';
        $cuenta = 'root';
        $password = '';
        $bd = 'truenews';
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);
        if ($conexion->connect_errno) {
            die('Error en la conexion');
        } else {
            //echo 'Conexion exitosa';
            return $conexion;
        }
    }
    function selectBD($sql) {
        $resultado = conexion() -> query($sql);
        if ($resultado -> num_rows){
            return $resultado;
        }
        return null;
    }
    
    function insertDB($sql) {
        $conexion = conexion();
        $conexion->query($sql);
        $r = $conexion->affected_rows >= 1;
        mysqli_close($conexion);
        return $r;
    }
    
    function deleteDB($sql) {
        $conexion = conexion();
        $conexion->query($sql);
        $r = $conexion->affected_rows >= 1;
        mysqli_close($conexion);
        return $r;
    }
    
    function updateDB($sql) {
        $conexion = conexion();
        $conexion->query($sql);
        $r = $conexion->affected_rows >= 1;
        mysqli_close($conexion);
        return $r;
    }
?>