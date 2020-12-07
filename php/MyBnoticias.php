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
                $periodista = $_SESSION['user_id']; 
                $sql = "SELECT * FROM noticia WHERE id_periodista = '$periodista' order by fecha desc";
                $res = mysqli_query($conn,$sql);
                
                while($mostrar = mysqli_fetch_array($res)){
                    
                    ?>
                    
                    <div class="row contorno mt-5">
                        <div class="col-sm-7">
                            <img class="img_noticia" src="<?php echo $mostrar['img'];?>" alt="">
                        </div>
                        <div class="col-sm-5">
                            <h2 class="titulos"><?php echo $mostrar['titulo']; ?></h2>
                            <p><?php echo $mostrar['descripcion']; ?></p>
                            <p><?php echo $mostrar['fecha']; ?></p>
                            <div class="botones">
                            <button class="mr-3" onclick="modificar(<?php echo $mostrar['id'];?>,<?php echo $mostrar['id_lugar']?>)">Modificar</button><button class="mr-3" onclick="eliminar(<?php echo $mostrar['id']?>)">Eliminar</button>
                            <button class="mr-3" onclick="involucrados(<?php echo $mostrar['id']?>)">Editar Involucrados</button>
                            </div>
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
    function modificar(id, id_lugar){
        
        location.href = "modificarNoticia.php?id="+id+"&id_lugar="+id_lugar;
    }
</script>