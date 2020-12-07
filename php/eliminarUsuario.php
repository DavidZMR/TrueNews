<?php
session_start();
require 'conexionMYSQL.php';
$conec=conexion();
$id=$_GET['a'];

if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){
    $query2="DELETE FROM lector WHERE lector.id=$id";
    $res2 = mysqli_query($conec, $query2);
}
if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){
    $query2="DELETE FROM valido WHERE id=$id";
    $res = mysqli_query($conec, $query2);
    $query3="DELETE FROM periodista WHERE id=$id";
    $res3 = mysqli_query($conec, $query3);
    }
if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){
    $query2="DELETE FROM invalido WHERE id=$id";
    $res = mysqli_query($conec, $query2);
    $query3="DELETE FROM periodista WHERE id=$id";
    $res3 = mysqli_query($conec, $query3);
    }


$query="DELETE FROM usuario WHERE usuario.id=$id";
//$resultado=$conn->query($query2);
$res = mysqli_query($conec, $query);
mysqli_close($conn);

session_destroy();
?>