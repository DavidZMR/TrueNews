<?php 
    include 'conexionMYSQL.php';
    $nombres = $_POST['nombres'];
    $ap_pa = $_POST['ap_pa'];
    $ap_ma = $_POST['ap_ma'];
    $edad = $_POST['edad'];
    $conn = conexion();
    $sql = "SELECT id from involucrado LAST_INSERT_ID ()";
    $id_involucrado = mysqli_query($conn,$sql);
    
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
                <h1>Agregar involucrados</h1><br>
            </div>
            <div class="row">
            <form action="add_involucrado.php" method="POST">
                    <input type="text" name="nombres" id="nombres" placeholder="nombres" required value=""><br>
                            <input type="text" placeholder="Apellido Paterno" name="ap_pa" id="ap_pa" required value=""><br>
                            <input type="text" placeholder="Apellido Materno" name="ap_ma" id="ap_ma" required value=""><br>
                            <input type="number" placeholder="Edad" name="edad" id="edad" required value=""><br>
                            
                            <input type="submit" value="Añadir"><br>
                    </form>
            </div>
        </div>
    </div>
    <?php include 'includes/footer1.php'?>
</body>
</html>