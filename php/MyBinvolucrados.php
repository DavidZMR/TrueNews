<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/invo.css">
</head>
<body>
    <?php include 'includes/navbar.php'?>

    <div id="row-full noticias">
            <div class="col-12">
            <?php
                include 'conexionMYSQL.php';
                $conn = conexion();
                $id= $_GET['id'];
                $_SESSION['id_aux'] = $id;
                //echo $id;
                $sql = "SET @MyVariable='$id'";
                $res = mysqli_query($conn,$sql);
                $sql = "SELECT * FROM esta_involucrado ";
                $res = mysqli_query($conn,$sql);
                $sql = "SELECT usuario.nombres ,COUNT(*) FROM involucrado
                INNER JOIN se_involucra on involucrado.id = se_involucra.id_involucrado
                INNER JOIN noticia on se_involucra.id_noticia = noticia.id 
                INNER JOIN periodista on noticia.id_periodista = periodista.id 
                inner join usuario on periodista.id = usuario.id where
                noticia.id = '$id'";
                $total = mysqli_fetch_array(mysqli_query($conn,$sql));
                echo "<h1>El total de involucrados es ".$total['COUNT(*)']." agregados por ".$total['nombres']."</h1>";

                while($mostrar = mysqli_fetch_array($res)){
                    ?>
                    <div class="row">
                        <div class="col-sm-12 cont mt-5">
                            <h4><label for="">Nombres: </label> <?php echo $mostrar['nombres']; ?></h4>
                            <p><label for="">Apellido paterno:</label> <?php echo $mostrar['ap_pa']; ?></p>
                            <p><label for="">Apellido materno: </label> <?php echo $mostrar['ap_ma']; ?></p>
                            <p><label for="">Edad: </label> <?php echo $mostrar['edad']; ?></p>
                            <button onclick="modificar(<?php echo $mostrar['id']?>)">Modificar</button><button onclick="eliminar(<?php echo $mostrar['id']?>)">Eliminar</button>
                        </div>
                    </div>
            <?php
                }

            ?>
            </div>
        </div>
    <?php include 'includes/footer1.php'?>
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
            xhttp1.open("GET", "eliminaInvolucrado.php?id=" + id, true);
            xhttp1.send();
            location.reload();
    }
    function modificar(id){
        location.href = "modificaInvolucrado.php?id="+id;
    }
</script>