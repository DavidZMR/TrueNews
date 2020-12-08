<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/detalles.css">
</head>
<body>
    <?php include 'includes/navbar.php'?>
    <?php
        include 'conexionMYSQL.php';
        $conn = conexion();
        $id = $_GET['id'];
        $sql = "SET @MyVariable:= '$id'";
        $res = mysqli_query($conn,$sql);
        $sql = "SELECT * FROM get_noticia ";
        $res = mysqli_query($conn,$sql);
        $noticia = mysqli_fetch_array($res);
        //$id_lugar = $noticia['id_lugar'];
        $sql = "SET @MyVariable:=".$noticia['id_lugar'];
        $res = mysqli_query($conn,$sql);
        $sql = "SELECT * FROM get_lugar";
        $res = mysqli_query($conn,$sql);
        $lugar = mysqli_fetch_array($res);
        $sql = "SET @MyVariable='$id'";
        $res = mysqli_query($conn,$sql);
        $sql = "SELECT * FROM esta_involucrado ";
        $res = mysqli_query($conn,$sql);
        $indice=0;
        
    ?>
    <div class="container">
        <div class="">
            <div class="row-full">
                
                <div class="row mt-5 contorno">
                    <div class="col-sm-7">
                        <img class="img_noticia" src="<?php echo $noticia['img'];?>" alt="">
                    </div>
                    <div class="col-sm-5">
                        <h2 class="titulos"><?php echo $noticia['titulo']; ?></h2>
                        <p><?php echo $noticia['fecha']; ?></p>
                        <p><label for="">Categoria: </label> <?php echo $noticia['categoria'];?></p>
                        <p><?php echo $noticia['descripcion']; ?></p>
                    </div>
                </div>
                <h5>Lugar de los echos</h5>
                <table class="table table-striped">
					<thead>
						<tr>
                            <th>Pais</th>
							<th>Estado</th>
							<th>Municipio</th>
                            <th>Calle</th>
                            <th>Numero</th>
						</tr>
                    </thead>
                    <tbody>
						<tr>
                            <td><?php echo $lugar['pais'];?></td>
							<td><?php echo $lugar['ciudad'];?></td>
							<td><?php echo $lugar['municipio'];?></td>
                            <td><?php echo $lugar['calle'];?></td>
                            <td><?php echo $lugar['numero'];?></td>
						</tr>
                    </tbody>
                </table>
                <h5>Involucrados</h5>
                <table class="table table-striped">
					<thead>
						<tr>
                            <th>Involucrado</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Edad</th>
						</tr>
					</thead>
                <?php while($involucrados = mysqli_fetch_array($res)){
                    $indice+=1;?>
                    
					<tbody>
						<tr>
                            <td><?php echo $indice;?></td>
							<td><?php echo $involucrados['nombres'];?></td>
							<td><?php echo $involucrados['ap_pa']." ".$involucrados['ap_ma'];?></td>
							<td><?php echo $involucrados['edad'];?></td>
						</tr>
					</tbody>
				
                <?php };?>
                </table>
            </div>

        </div>
    </div>


    <?php include 'includes/footer1.php'?>
</body>
</html>