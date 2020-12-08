<?php 
include 'conexionMYSQL.php';
session_start();
$conn = conexion();

$comentario=$_POST['comentario'];
$noticia = $_SESSION['comentario_id'];
if(isset($_SESSION['user_id'])){
    $usuario = $_SESSION['user_id'];
}else{
    $usuario = "";
}

$sql = "INSERT INTO criticas(id_lector, id_noticia, texto) VALUES ('$usuario', '$noticia', '$comentario')";
if(isset($_SESSION['bandLector']) && $_SESSION['bandLector']){
    mysqli_query($conn,$sql);
}
header("Location: detalles.php?id=".$noticia);


?>