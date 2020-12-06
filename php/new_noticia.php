<?php

session_start();

$servername = "localhost";
$database = "truenews";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
/*$sql = "INSERT INTO usuario(id,nombres,ap_pa,ap_ma,edad,correo,tel,pass) VALUES ('1','h','h','h','3','zemre@hot.com','3','3')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

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


$sql = "INSERT INTO lugar(pais,ciudad,municipio,colonia,calle,numero) VALUES ('$pais','$ciudad','$municipio','$colonia','$calle','$numero')";
mysqli_query($conn,$sql);

$id_lugar=mysqli_insert_id($conn);


//$sql = "INSERT INTO noticia(id_lugar,id_periodista,fecha,descripcion,img,categoria,titulo) VALUES ('2','2','02/02/2020','a','a','a','a')";
//$sql = "INSERT INTO involucrado(id,nombres,ap_pa,ap_ma,edad) VALUES ('2','$titulo','a','a','$edad')";
/*if(mysqli_query($conn,$sql)){
    echo "New record created successfully";
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/


// Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
 
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000))
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/images/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    }
    else
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
}
else
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
}
session_start();
$periodista = $_SESSION['user_id'];
$imagen = "/images/".$nombre_img;
$sql = "INSERT INTO noticia(id_lugar,id_periodista,fecha,descripcion,img,categoria,titulo) VALUES ('$id_lugar','$periodista','$fecha','$descripcion','$imagen','$categoria','$titulo')";
if(mysqli_query($conn,$sql)){
    $id_noticia=mysqli_insert_id($conn);
    $_SESSION['id_noticia']=$id_noticia;

}else{
    
    echo mysqli_error($conn);
    
}
mysqli_close($conn);
header("Location: add_involucrado.php ")
?>
