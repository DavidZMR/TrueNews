<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <?php include 'includes/navbar.php';?>

    <div id="row-full noticias">
            <div class="col-12">
            <?php
                include 'conexionMYSQL.php';
                $conn = conexion();
                $periodista = $_SESSION['id'];
                $sql = "SELECT * FROM noticia WHERE id_periodista = '$periodista'";
                $res = mysqli_query($conn,$sql);
                while($mostrar = mysqli_fetch_array($res)){
                    
                    ?>
                    
                    <div class="row">
                        <div class="col-sm-7">
                            <img style="min-width: max-content; min-height: max-content;" src="<?php echo $mostrar['img'];?>" alt="">
                        </div>
                        <div class="col-sm-5">
                            <h4><?php echo $mostrar['titulo']; ?></h4>
                            <p><?php echo $mostrar['descripcion']; ?></p>
                            <p><?php echo $mostrar['fecha']; ?></p>
                            <button onclick="modificar(<?php echo $mostrar['id']?>)">Modificar</button><button onclick="eliminar(<?php echo $mostrar['id']?>)">Eliminar</button>
                            <button onclick="involucrados(<?php echo $mostrar['id']?>)">Editar Involucrados</button>
                        </div>
                    </div>
            <?php
                    
                }

            ?>
            </div>
        </div>
    

    <?php include 'includes/footer1.php'; ?>
</body>
</html>
<script>
    function eliminar(id){
        var xhttp1 = new XMLHttpRequest();
            xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response != "error") {
                        //document.getElementById("contenido").innerHTML=tipo1;
                        
                    } else {
                        
                    }
                }
            };
            xhttp1.open("GET", "eliminaNoticia.php?id=" + id, true);
            xhttp1.send();
            location.reload();
    }
    function involucrados(id){
        location.href = "MyBinvolucrados.php?id="+id;
    }
    function modificar(id){
        location.href = "modificarNoticia.php?id="+id;
    }
</script>