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
                
                <div class="row">
                    <h1>Agregar Nueva Noticia.</h1> <br>
                </div>
                <div class="row">
                    <form action="new_noticia.php" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Titulo" name="titulo" id="titulo" requierd value=""><br>
                        <input type="date" placeholder="Fecha" name="fecha" id="fecha" required value=""><br>
                        
                        <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="descripcion"></textarea><br>
                        <label for="categoria">Categoria: </label>
                        <select name="categoria" id="categoria">
                            <option value="Criminal">Criminal</option>
                            <option value="Politica">Política</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Ciencia">Ciencia</option>
                            <option value="Tecnologia">Tecnología</option>
                            <option value="Otros">Otros</option>
                        </select><br>
                        <label for="">Lugar</label><br>
                        <input type="text" placeholder="Pais" name="pais" id="pais" required value=""><br>
                        <input type="text" placeholder="Ciudad" name="ciudad" id="ciudad" required value=""><br>
                        <input type="text" placeholder="Municipio" name="municipio" id="municipio" required value=""><br>
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
        </div>

    <?php include 'includes/footer1.php'?>

    

    
</body>
</html>