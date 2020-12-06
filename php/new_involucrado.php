<?php 
    include 'conexionMYSQL.php';
    session_start();
    $id_noticia=$_SESSION['id_noticia'];
    $nombres = $_POST['nombres'];
    $ap_pa = $_POST['ap_pa'];
    $ap_ma = $_POST['ap_ma'];
    $edad = $_POST['edad'];
    $conn = conexion();
    
    echo $id_noticia;

    $sql="INSERT INTO involucrado(nombres,ap_pa,ap_ma,edad) VALUES ('$nombres','$ap_pa','$ap_ma','$edad')";
    mysqli_query($conn,$sql);
    $id_involucrado=mysqli_insert_id($conn);
    $sql="INSERT INTO se_involucra(id_involucrado,id_noticia)VALUES('$id_involucrado','$id_noticia')";
    mysqli_query($conn,$sql);

    mysqli_close($conn);
    header("Location: add_involucrado.php");
?>