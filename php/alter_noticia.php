<?php 
include 'conexionMYSQL.php';
$conn=conexion();
session_start();

$id_noticia = $_SESSION['id_noticia'];
$id_lugar = $_SESSION['id_lugar'];
$fecha = $_POST['fecha'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$municipio = $_POST['municipio'];
$colonia = $_POST['colonia'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$titulo = $_POST["titulo"];

$sql = "UPDATE lugar SET pais = '$pais', ciudad = '$ciudad', municipio = '$municipio', colonia = '$colonia', calle = '$calle', numero = '$numero' where id = '$id_lugar'";
mysqli_query($conn,$sql);
$sql = "UPDATE noticia set titulo = '$titulo', fecha = '$fecha', descripcion = '$descripcion', categoria = '$categoria' where id = '$id_noticia'";
mysqli_query($conn,$sql);
mysqli_close($conn);

header("Location: MyBnoticias.php");

?>