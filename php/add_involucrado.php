
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'includes/navbar.php'?>
    <div class="container align-content-center">
        <div class="row">
        <div class="col-12 ">
            
                <fieldset>
                <legend class="">Agregar involucrados</legend><br>
            
                <div class="row">
                    <form class="form-horizontal" action="new_involucrado.php" method="POST">
                        
                            <input class="form-control" type="text" name="nombres" id="nombres" placeholder="nombres" required value=""><br>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" name="ap_pa" id="ap_pa" required value=""><br>
                            <input class="form-control" type="text" placeholder="Apellido Materno" name="ap_ma" id="ap_ma" required value=""><br>
                            <input class="form-control" type="number" placeholder="Edad" name="edad" id="edad" required value=""><br>
                            
                            <input type="submit" value="Añadir">
                    </form>
                    
                    
                </div>
                <div class="row">
                    <button onclick="salir()">Crear</button>
                </div>
                </fieldset>
            
        </div>   
        </div>
    </div>
    <?php include 'includes/footer1.php'?>
</body>
</html>
<?php
function salir(){
    header("Location: index.php");
}

?>
