<?php
if(!isset($_SESSION)){
	session_start();
}
require 'conexionMYSQL.php';
?>
<!DOCTYPE html>-
<html lang="en">
<head>
	<title>Editar Perfil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/utilEditar.css">
	<link rel="stylesheet" type="text/css" href="/css/mainEditar.css">
<!--===============================================================================================-->
</head>
<body>
<?php include("includes/navbar.php"); ?>

        <div class="row-full" style="background: #343a40;">
            <div class="row justify-content-around" >
                <h4 style="color:white;">Editar Perfil</h4>
            
            </div>
        </div>
	<div class="limiter">
		<div class="container-table100">
            <h4>Tus datos son los siguientes</h4>
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100-firstcol">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Usuario</th>
								</tr>
							</thead>
							<tbody>
								<tr class="row100 body">
                                    <?php 
                                    $conexion=conexion();
                                    $idusu=$_SESSION['user_id'];

                                    $sql1 = "SELECT * from usuario where id= $idusu";
                                    
                                    $res = mysqli_query($conexion, $sql1);
                                    $mostrar = mysqli_fetch_array($res);?>
									<td class="cell100 column1"><?php echo $mostrar['id'];?></td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="wrap-table100-nextcols js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thead>
									<tr class="row100 head">
										<th class="cell100 column6">Nombre</th>
										<th class="cell100 column6">Apellido Paterno</th>
										<th class="cell100 column6">Apellido Materno</th>
										<th class="cell100 column6">Edad</th>
										<th class="cell100 column6">Correo Electronico</th>
										<th class="cell100 column6">Teléfono</th>
                                        <th class="cell100 column6">Contraseña</th>
                                        <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){ ?>
                                        <th class="cell100 column6">Estado Preferido</th>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){?>
                                        <th class="cell100 column6">Id del periodico</th>
                                        <th class="cell100 column6">Cedula</th>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){?>
                                        <th class="cell100 column6">Publicaciones</th>
                                        <?php } ?>
                                        
                                        
									</tr>
									
								</thead>
								<tbody>
									<tr class="row100 body">
										<td class="cell100 column6"><?php echo $mostrar['nombres']?></td>
										<td class="cell100 column6"><?php echo $mostrar['ap_pa']?></td>
										<td class="cell100 column6"><?php echo $mostrar['ap_ma']?></td>
										<td class="cell100 column6"><?php echo $mostrar['edad']?></td>
										<td class="cell100 column6"><?php echo $mostrar['correo']?></td>
										<td class="cell100 column6"><?php echo $mostrar['tel']?></td>
                                        <td class="cell100 column6"><?php echo $mostrar['pass']?></td>
                                        <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){ 
                                            $sql2 = "SELECT * from lector where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><?php echo $mostrar2['estado']?></td>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){
                                            $sql2 = "SELECT * from valido where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><?php echo $mostrar2['id_periodico']?></td>
                                        <td class="cell100 column6"><?php echo $mostrar2['cedula']?></td>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){
                                            $sql2 = "SELECT * from invalido where id= $idusu";
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><?php echo $mostrar2['num_publicaciones']?></td>
                                        <?php } ?>
									</tr>
									<!-- <tr class="row100 body">
										<td class="cell100 column6"><input type="text" name="nombres" value="<?php echo $mostrar['nombres']?>"></td>
										<td class="cell100 column6"><input type="text" name="ap_pa" value="<?php echo $mostrar['ap_pa']?>"></td>
										<td class="cell100 column6"><input type="text" name="ap_ma" value="<?php echo $mostrar['ap_ma']?>"></td>
										<td class="cell100 column6"><input type="text" name="edad" value="<?php echo $mostrar['edad']?>"></td>
										<td class="cell100 column6"><input type="text" name="correo" value="<?php echo $mostrar['correo']?>"></td>
										<td class="cell100 column6"><input type="text" name="tel" value="<?php echo $mostrar['tel']?>"></td>
                                        <td class="cell100 column6"><input type="text" name="pass" value="<?php echo $mostrar['pass']?>"></td>
                                        <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){ 
                                            $sql2 = "SELECT * from lector where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><input type="text" name="estado" value="<?php echo $mostrar2['estado']?>"> </td>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){
                                            $sql2 = "SELECT * from valido where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><input type="text" name="id_periodico" value="<?php echo $mostrar2['id_periodico']?>"></td>
                                        <td class="cell100 column6"><input type="text" name="cedula" value="<?php echo $mostrar2['cedula']?>" ></td>
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){
                                            $sql2 = "SELECT * from invalido where id= $idusu";
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        <td class="cell100 column6"><input type="text" name="num_publicaciones" value="<?php echo $mostrar2['num_publicaciones']?>"></td>
                                        <?php } ?>
									</tr> -->
								</tbody>
                            </table>
                            
						</div>
					</div>
                </div>

                <br><br>
                <h6>¿Deseas realizar cambios?</h6> <br>
                <button class="btn btn-outline-danger" onclick="eliminar()">Eliminar cuenta</button>
                <button class="btn btn-outline-dark" onclick="modificar()">Modificar cuenta</button>
                <br>
                <div id="contenedor">

                </div>

                
			</div>
		</div>
	</div>

    <?php include("includes/footer1.php"); ?>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
    <script src="/js/mainEditar.js"></script>
    <script>

        function eliminar(){
            
            var id= <?php echo $idusu ?>;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.href = "index.php";
                    alert("usuario eliminado")
                   
                }
            };
            xhttp.open("GET", "eliminarUsuario.php?a="+id, true);
            xhttp.send();
        }

        function modificar(){
			alert("modificar");
            document.getElementById('contenedor').innerHTML="<br><br> <h4>Modifica tu usuario</h4>";
            var tabla=document.getElementById("contenedor");
            tabla.innerHTML+='<br><br> <div class="table100 ver1">'+
					'<div class="table100-firstcol">'+
						'<table>'+
							'<thead>'+
								'<tr class="row100 head">'+
									'<th class="cell100 column1">Usuario</th>'+
								'</tr>'+
							'</thead>'+
							'<tbody>'+
								'<tr class="row100 body">'+
                                
									'<td class="cell100 column1"><?php echo $mostrar['id'];?></td>'+
								'</tr>'+
							'</tbody>'+
						'</table>'+
					'</div>'+
					
					'<div class="wrap-table100-nextcols js-pscroll">'+
						'<div class="table100-nextcols">'+
							'<table id="tabla1">'+
								'<thead>'+
									'<tr class="row100 head">'+
										'<th class="cell100 column6">Nombre</th>'+
										'<th class="cell100 column6">Apellido Paterno</th>'+
										'<th class="cell100 column6">Apellido Materno</th>'+
										'<th class="cell100 column6">Edad</th>'+
										'<th class="cell100 column6">Correo Electronico</th>'+
										'<th class="cell100 column6">Telefono</th>'+
                                        '<th class="cell100 column6">Contraseña</th>'+
                                        <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){ ?>
                                        '<th class="cell100 column6">Estado Preferido</th>'+
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){?>
                                        '<th class="cell100 column6">Id del periodico</th>'+
                                        '<th class="cell100 column6">Cedula</th>'+
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){?>
                                        '<th class="cell100 column6">Publicaciones</th>'+
                                        <?php } ?>
									'</tr>'+
								'</thead>'+
                             '</table>'+
						'</div>'+
					'</div>'+
                '</div>';
                var elemento = document.createElement('tr');
                elemento.innerHTML +=
				'<td class="cell100 column6"><input type="text" id="nombres" value="<?php echo $mostrar['nombres']?>"></td>'+
										'<td class="cell100 column6"><input type="text" id="ap_pa" value="<?php echo $mostrar['ap_pa']?>"></td>'+
										'<td class="cell100 column6"><input type="text" id="ap_ma" value="<?php echo $mostrar['ap_ma']?>"></td>'+
										'<td class="cell100 column6"><input type="text" id="edad" value="<?php echo $mostrar['edad']?>"></td>'+
										'<td class="cell100 column6"><input type="text" id="correo" value="<?php echo $mostrar['correo']?>"></td>'+
										'<td class="cell100 column6"><input type="text" id="tel" value="<?php echo $mostrar['tel']?>"></td>'+
                                        '<td class="cell100 column6"><input type="text" id="pass" value="<?php echo $mostrar['pass']?>"></td>'+
                                        <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){ 
                                            $sql2 = "SELECT * from lector where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        '<td class="cell100 column6"><input type="text" id="estado" value="<?php echo $mostrar2['estado']?>"> </td>'+
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){
                                            $sql2 = "SELECT * from valido where id= $idusu";
                                    
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        '<td class="cell100 column6"><input type="text" id="id_periodico" value="<?php echo $mostrar2['id_periodico']?>"></td>'+
                                        '<td class="cell100 column6"><input type="text" id="cedula" value="<?php echo $mostrar2['cedula']?>" ></td>'+
                                        <?php } ?>
                                        <?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){
                                            $sql2 = "SELECT * from invalido where id= $idusu";
                                            $res2 = mysqli_query($conexion, $sql2);
                                            $mostrar2 = mysqli_fetch_array($res2);?>
                                        '<td class="cell100 column6"><input type="text" id="num_publicaciones" value="<?php echo $mostrar2['num_publicaciones']?>"></td>'+
                                        <?php } ?>
										'';
                document.getElementById('tabla1').appendChild(elemento);
				tabla.innerHTML += "<br> <input class='btn btn-info' type='button' value='Enviar' onclick='mod()'>";

        }
		function mod(){
			alert("entre mod");
			var nombres=document.getElementById("nombres").value;
			var ap_pa=document.getElementById("ap_pa").value;
			var ap_ma=document.getElementById("ap_ma").value;
			var edad=document.getElementById("edad").value;
			var correo=document.getElementById("correo").value;
			var tel=document.getElementById("tel").value;
			var pass=document.getElementById("pass").value;
			var xhttp1 = new XMLHttpRequest();
			xhttp1.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response != "error") {
                        //document.getElementById("contenido").innerHTML=tipo1;
                        document.getElementById("res").innerHTML += this.response;
                    } else {
                        document.getElementById("res").innerHTML = "<p>No se modifico, el ID al que quieres modificar ya existe</p>";
                    }
                }
            };
			<?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){?>
			var estado=document.getElementById("estado").value;
			xhttp1.open("GET", "modificaUsuario.php?a=" + nombres + "&b=" + ap_pa + "&c="+ap_ma+"&q="+edad +"&d=" + correo + "&f=" + tel + "&g=" + pass + "&h=" + estado, true);
			<?php } ?>
			<?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==true){?>
			var id_periodico=document.getElementById("id_periodico").value;
			var cedula=document.getElementById("cedula").value;
			xhttp1.open("GET", "modificaUsuario.php?a=" + nombres + "&b=" + ap_pa + "&c="+ap_ma+"&q="+edad+"&d=" + correo + "&f=" + tel + "&g=" + pass + "&h=" + id_periodico+"&i="+cedula, true);
			<?php } ?>
			<?php if(isset ($_SESSION['bandUsuario']) && $_SESSION['bandUsuario']==false){?>
			var num_publicaciones=document.getElementById("num_oublicaciones").value;
			xhttp1.open("GET", "modificaUsuario.php?a=" + nombres + "&b=" + ap_pa + "&c="+ap_ma+"&q="+edad+"&d=" + correo + "&f=" + tel + "&g=" + pass + "&h=" + num_publicaciones, true);
			<?php } ?>
            xhttp1.send();

		}
    </script>


</body>
</html>