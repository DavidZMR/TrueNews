<?php 
include 'conexionMYSQL.php';
$id = $_GET['id'];
$conn= conexion();
$sql = "DELETE FROM se_involucra WHERE id_involucrado = '$id' ";
mysqli_query($conn,$sql);
$sql = "DELETE FROM involucrado WHERE id = '$id'";
mysqli_query($conn,$sql);

mysqli_close($conn);
?>