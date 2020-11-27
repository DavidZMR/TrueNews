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
        <div class="row-full">
            <div class="row">
                <div class="col-9" id="noticias">

                </div>
                <div class="col-3 ">

                </div>
            </div>
        </div>
    </div>
    

    <?php include("includes/footer1.php"); ?>
</body>
</html>