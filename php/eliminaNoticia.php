<?php 
include 'conexionMYSQL.php';
$conn = conexion();

$id=$_GET['id'];

$sql = "SELECT id_involucrado FROM se_involucra WHERE id_noticia = '$id'";
$res=mysqli_query($conn,$sql);
print_r($res);
while($array=mysqli_fetch_array($res)){
    $index = 0;
    print_r( $array);
    $sql = "DELETE FROM se_involucra WHERE id_involucrado = '$array[$index]'";
    mysqli_query($conn,$sql);
    $sql = "DELETE FROM involucrado WHERE id = '$array[$index]'";
    mysqli_query($conn,$sql);
    $index+=1;
}

//$sql = "DELETE FROM se_involucra where id_noticia = '$id'";
//mysqli_query($conn,$sql);

$sql = "DELETE FROM noticia WHERE id = '$id'";
mysqli_query($conn,$sql);

mysqli_close($conn);
//header("Location: MyBnoticias.php");


?>