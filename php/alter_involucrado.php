<?php 
session_start();
$id = $_SESSION['id_involucrado'];
include 'conexionMYSQL.php';
$conn = conexion();
$nombres = $_POST['nombres'];
$ap_pa = $_POST['ap_pa'];
$ap_ma = $_POST['ap_ma'];
$edad = $_POST['edad'];

$sql = "UPDATE involucrado SET nombres = '$nombres', ap_pa = '$ap_pa', ap_ma = '$ap_ma', edad= '$edad' where id= '$id'";
mysqli_query($conn,$sql);
mysqli_close($conn);

header("Location: MyBinvolucrados.php");
?>