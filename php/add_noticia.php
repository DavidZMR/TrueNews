<?php 
    session_start();
    include 'conexionMYSQL.php';
    $sql = "SELECT id from noticia LAST_INSERT_ID ()";
    $conn = conexion();
    $ultimo_id_noticia=mysqli_query($conn,$sql);
    $ultimo_id_noticia+=1;
    $_SESSION['id_noticia']=$ultimo_id_noticia;

    $sql = "SELECT id from lugar LAST_INSERT_ID ()";
    $conn = conexion();
    $ultimo_id_lugar=mysqli_query($conn,$sql);
    $ultimo_id_lugar+=1;
    $_SESSION['id_lugar']=$ultimo_id_lugar;

    echo $ultimo_id_noticia;
    echo $ultimo_id_lugar;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php include 'includes/navbar.php'?>
        <div class="container">
            <div class="col">
                <div class="row">
                    <h1>Agregar Nueva Noticia.</h1> <br>
                </div>
                <div class="row">
                    <form action="new_noticia.php" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Titulo" name="titulo" id="titulo" requierd value=""><br>
                        <input type="date" placeholder="Fecha" name="fecha" id="fecha" required value=""><br>
                        <input type="text" placeholder="Descripcion" name="descripcion" id="descripcion" required value=""><br>
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" id="categoria">
                            <option value="Criminal">Criminal</option>
                            <option value="Politica">Politica</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Tecnologia">Tecnologia</option>
                            <option value="Otros">Otros</option>
                        </select><br>
                        <label for="">Lugar</label><br>
                        <input type="text" placeholder="Pais" name="pais" id="pais" required value=""><br>
                        <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad" required value=""><br>
                        <input type="text" placeholder="Municipio" name="munucipio" id="municipio" required value=""><br>
                        <input type="text" placeholder="Colonia" id="colonia" name="colonia" required value=""><br>
                        <input type="text" placeholder="Calle" name="calle" id="calle" required value=""><br>
                        <input type="number" placeholder="Numero" id="numero" name="numero" required value=""><br>
                        
                        
                        <label for="">Imagen</label><br>
                        <input type="file" name="imagen" id="imagen">
                        <br>
                        <input type="submit" value="Agregar">


                    </form>
                </div>
                
            </div>
        </div>

    <?php include 'includes/footer1.php'?>

    

    
</body>
</html>