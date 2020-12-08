<?php 
    
    include 'conexionMYSQL.php';
    $conn = conexion();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/agregar.css">
    
</head>
<body>
    <?php include 'includes/navbar.php'?>
        <div class="container">
            <div class="col">
            <div class="col contenedor">
                <?php 
                    $id_noticia=$_GET['id'];
                    $_SESSION['comentario_id']=$id_noticia;
                ?>
                
                <div class="row">
                    <h1>Agregar Comentario.</h1> <br>
                </div>
                <div class="row">
                    <form action="new_comentario.php" method="POST" enctype="multipart/form-data">
                        <textarea name="comentario" id="descripcion" cols="30" rows="10" placeholder="comentario"></textarea><br>
                        <input type="submit" value="Añadir">
                    </form>
                </div>
                </div>  
            </div>
        </div>

    <?php include 'includes/footer1.php'?>

    

    
</body>
</html>