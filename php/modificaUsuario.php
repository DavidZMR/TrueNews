<?php
require 'conexionMYSQL.php';
session_start();
$conexion=conexion();
$id=$_SESSION['user_id'];
$a=$_GET['a'];
$b=$_GET['b'];
$c=$_GET['c'];
$d=$_GET['d'];
$e=$_GET['e'];
$f=$_GET['f'];
$g=$_GET['g'];
$h=$_GET['h'];
$i=$_GET['i'];

if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){
    $h=$_GET['h'];
    $query2="UPDATE lector SET estado='$h' WHERE id='$id'";
    $res = mysqli_query($conexion, $query2);
    
}
if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){
    $h=$_GET['h'];
    $i=$_GET['i'];
    $query2="UPDATE valido SET id_periodico='$h' , cedula='$i' WHERE id='$id'";
    $res = mysqli_query($conexion, $query2);
}
if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){
    $h=$_GET['h'];
    $query2="UPDATE invalido SET id_periodico='$h' , cedula='$i' WHERE id='$id'";
    $res = mysqli_query($conexion, $query2);
}
$query2="UPDATE usuario SET id='$id', nombres='$a', ap_pa='$b', ap_ma='$c', edad='$d', correo='$e', tel='$f', pass='$g' WHERE id='$id'";
$res = mysqli_query($conexion, $query2);

?>