<?php 
include 'conexionMYSQL.php';
$conn = conexion();

$id=$_GET['id'];

$sql = "SELECT id_involucrado FROM se_involucra WHERE id_noticia = '$id'";
$res=mysqli_query($conn,$sql);
print_r($res);
$index = 0;
while($array=mysqli_fetch_array($res)){
    
    //print_r( $array);
    $sql = "DELETE FROM se_involucra WHERE id_involucrado = '$array[$index]'";
    mysqli_query($conn,$sql);
    $sql = "DELETE FROM involucrado WHERE id = '$array[$index]'";
    mysqli_query($conn,$sql);
    $index+=1;
}
$sql ="SELECT id from criticas where id_noticia = '$id'";
$res5 = mysqli_query($conn,$sql);
$index = 0;

;

while($arraycom = mysqli_fetch_array($res5)){
    echo $arraycom[$index];
    $sql = "DELETE FROM criticas WHERE id = '$arraycom[$index]'";
    mysqli_query($conn,$sql);
    $index+=1;

}


//$sql = "DELETE FROM se_involucra where id_noticia = '$id'";
//mysqli_query($conn,$sql);

$sql = "DELETE FROM noticia WHERE id = '$id'";
mysqli_query($conn,$sql);

mysqli_close($conn);
header("Location: MyBnoticias.php");


?>