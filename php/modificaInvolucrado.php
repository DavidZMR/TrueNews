<?php 

$id = $_GET['id'];
echo $id;
session_start();
$_SESSION["identificador"]=$id;

$_SESSION['aux'] = $id;
echo $_SESSION['aux'];
include 'conexionMYSQL.php';
$conn = conexion();

$sql = "SELECT * FROM involucrado WHERE id = '$id'";
$res = mysqli_query($conn,$sql);
$involucrado = mysqli_fetch_array($res);
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
    <div class="container align-content-center">
        <div class="row">
        <div class="col-12 ">
            
                <fieldset>
                <legend class="">Editar involucrados</legend><br>
            
                <div class="row">
                    <form class="form-horizontal" action="alter_involucrado.php" method="POST">
                        
                            <input class="form-control" type="text" name="nombres" id="nombres" placeholder="nombres" required value="<?php echo $involucrado['nombres'] ?>"><br>
                            <input class="form-control" type="text" placeholder="Apellido Paterno" name="ap_pa" id="ap_pa" required value="<?php echo $involucrado['ap_pa'] ?>"><br>
                            <input class="form-control" type="text" placeholder="Apellido Materno" name="ap_ma" id="ap_ma" required value="<?php echo $involucrado['ap_ma'] ?>"><br>
                            <input class="form-control" type="number" placeholder="Edad" name="edad" id="edad" required value="<?php echo $involucrado['edad'] ?>"><br>
                            
                            <input type="submit" value="Modifica">
                    </form>
                    
                    
                </div>
                
                </fieldset>
            
        </div>   
        </div>
    </div>
    <?php include 'includes/footer1.php'?>
</body>
</html>