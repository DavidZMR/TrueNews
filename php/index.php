<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container">
        <div class="row-full" style="background: #343a40;">
            <div class="row justify-content-around" >
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/ciminal.jpg" alt=""></a><br>
                    <p>Criminal</p>
                </div>
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/politica.jpg" alt=""></a><br>
                    <p>Politica</p>
                </div>
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/deportes.jpg" alt=""></a><br>
                    <p>Deportes</p>
                </div>
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/ciencia.jpg" alt=""></a><br>
                    <p>Ciencia</p>
                </div>
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/tecnologia.jpg" alt=""></a><br>
                    <p>Tecnologia</p>
                </div>
                <div class="col-2 categoria text-center"> 
                    <a href="#"><img class="cat" src="/resourses/img/otros.png" alt=""></a><br>
                    <p>Otros</p>
                </div>
            
            </div>
        </div>
        <div id="row-full noticias">
            <div class="col-12">
            <?php
                include 'conexionMYSQL.php';
                $conn = conexion();
                $sql = "SELECT * FROM noticia order by fecha desc";
                $res = mysqli_query($conn,$sql);
                while($mostrar = mysqli_fetch_array($res)){
                    ?>
                    <div class="row mt-5 contorno">
                        <div class="col-sm-7">
                            <img class="img_noticia" src="<?php echo $mostrar['img'];?>" alt="">
                        </div>
                        <div class="col-sm-5">
                            <h2 class="titulos"><?php echo $mostrar['titulo']; ?></h2>
                            <p><?php echo $mostrar['fecha']; ?></p>
                            <p><?php echo $mostrar['descripcion']; ?></p>
                            
                        </div>
                    </div>
            <?php
                }

            ?>
            </div>
        </div>
    </div>
    

    <?php include("includes/footer1.php"); ?>
</body>
</html>
