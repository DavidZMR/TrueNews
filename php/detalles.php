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
        $aux2 = $res;
        $indice=0;
        $sql="SELECT * FROM criticas where id_noticia = '$id'";
        $resC = mysqli_query($conn,$sql);
        
        
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
                <h5>Lugar de los hechos</h5>
                <table class="table table-striped">
					<thead>
						<tr>
                            <th>País</th>
							<th>Estado</th>
							<th>Municipio</th>
                            <th>Calle</th>
                            <th>Número</th>
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
                <h5>Comentarios.</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($comentarios = mysqli_fetch_array($resC)){
                            $sql = "SELECT nombres, ap_pa, ap_ma from usuario where id = ".$comentarios['id_lector'];
                            $usuario = mysqli_fetch_array(mysqli_query($conn,$sql));
                        ?>
                        <tr>
                            <td scope="row"><?php echo $usuario['nombres']." ".$usuario['ap_pa']." ".$usuario['ap_ma']?></td>
                            <td><?php echo $comentarios['texto'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php if(isset($_SESSION['bandLector']) && $_SESSION['bandLector']){?>
                <button onclick="comentar(<?php echo $noticia['id']?>)">Comentar</a></button>
                <?php }?>
            </div>

        </div>
    </div>
    <script>
        function comentar(id){
            location.href = 'add_comentario.php?id='+id;
        }
    </script>


    <?php include 'includes/footer1.php'?>
</body>
</html>