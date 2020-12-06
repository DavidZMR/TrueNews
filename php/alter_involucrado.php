<?php 
session_start();
$id = $_SESSION['identificador'];


//$id_aux = $_SESSION['id_aux'];
include 'conexionMYSQL.php';
$conn = conexion();
$nombres = $_POST['nombres'];
$ap_pa = $_POST['ap_pa'];
$ap_ma = $_POST['ap_ma'];
$edad = $_POST['edad'];

$sql = "UPDATE involucrado SET id = '$id', nombres = '$nombres', ap_pa = '$ap_pa', ap_ma = '$ap_ma', edad= '$edad' where id= '$id'";
mysqli_query($conn,$sql);
mysqli_close($conn);

header("Location: MyBnoticias.php");
?>