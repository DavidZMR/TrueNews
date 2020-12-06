<?php 
    
    include 'conexionMYSQL.php';
    $conn = conexion();
    $id = $_GET['id'];
    $sql = "SELECT * FROM noticia Where id = '$id' ";
    $res = mysqli_query($conn,$sql);
    $noticia = mysqli_fetch_array($res);
    $id_lugar = $noticia['id_lugar'];
    $sql = "SELECT * FROM lugar WHERE id = '$id_lugar'";
    $res = mysqli_query($conn,$sql);
    $lugar = mysqli_fetch_array($res);
    $_SESSION['id_lugar'] = $id_lugar;
    $_SESSION['id_noticia'] = $id;
    
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
                    <form action="alter_noticia.php" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Titulo" name="titulo" id="titulo" requierd value="<?php echo $noticia['titulo'];?>"><br>
                        <input type="date" placeholder="Fecha" name="fecha" id="fecha" required value="<?php echo $noticia['fecha']?>"><br>
                        
                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="descripcion"></textarea><br>
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" id="categoria" >
                            <option value="Criminal">Criminal</option>
                            <option value="Politica">Politica</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Tecnologia">Tecnologia</option>
                            <option value="Otros">Otros</option>
                        </select><br>
                        <label for="">Lugar</label><br>
                        <input type="text" placeholder="Pais" name="pais" id="pais" required value="<?php echo $lugar['pais']?>"><br>
                        <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad" required value="<?php echo $lugar['ciudad']?>"><br>
                        <input type="text" placeholder="Municipio" name="municipio" id="municipio" required value="<?php echo $lugar['municipio']?>"><br>
                        <input type="text" placeholder="Colonia" id="colonia" name="colonia" required value="<?php echo $lugar['colonia']?>"><br>
                        <input type="text" placeholder="Calle" name="calle" id="calle" required value="<?php echo $lugar['calle']?>"><br>
                        <input type="number" placeholder="Numero" id="numero" name="numero" required value="<?php echo $lugar['numero']?>"><br>
                        
                        
                        <label for="">Imagen</label><br>
                        <input type="file" name="imagen" id="imagen">
                        <br>
                        <input type="submit" value="Modificar">


                    </form>
                </div>
                
            </div>
        </div>

    <?php include 'includes/footer1.php'?>

    

    
</body>
</html>