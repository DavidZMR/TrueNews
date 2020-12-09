<?php
	require 'conexionMYSQL.php';
	$message = '';
	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
	$ape_pat = isset($_POST['ape_pat']) ? $_POST['ape_pat'] : "";
	$ape_mat = isset($_POST['ape_mat']) ? $_POST['ape_mat'] : "";
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
	//lector
	// $bandLector=0;
	$bandLector = isset($_POST['banderaLector']) ? $_POST['banderaLector'] :"";
	$estado = isset($_POST['estado']) ? $_POST['estado'] : "";
	//periodista
	$bandPeriodista= isset($_POST['banderaPeriodista']) ? $_POST['banderaPeriodista'] : "";
	//periodista valido
	$banderaVal= isset($_POST['banderaValido']) ? $_POST['banderaValido'] :"";
	$id_periodico= isset($_POST['idPeriodico']) ? $_POST['idPeriodico'] :"";
	$cedula= isset($_POST['cedula']) ? $_POST['cedula'] :"";
	//periodista invalido
	$banderaNoVal= isset($_POST['banderaInvalido']) ? $_POST['banderaInvalido'] :"";
	$publicaciones=  isset($_POST['publicaciones']) ? $_POST['publicaciones'] :"";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $password = $_POST['password'];
            $sql = "INSERT INTO usuario(id,nombres,ap_pa,ap_ma,edad,correo,tel,pass) ";
            $sql .= "VALUES('$usuario', '$nombre', '$ape_pat', '$ape_mat', '$fecha','$email', '$telefono','$password')";
            if (insertDB($sql)) {
                //header('Location: login.php?s=1');
                $message = 'Insertado en usuario';
            } else {
                $message = 'Error en usuario';
            }
			
            if ($bandLector == "Lector"){
                $sqlLector = "INSERT INTO lector (id, id_usuario, estado) ";
                $sqlLector .= "VALUES ('$usuario','$usuario','$estado')";
                if (insertDB($sqlLector)) {
                    header('Location: login.php');
                    $message = 'Insertado en Lector';
                } else {
                    $message = 'Error en lector';
                }
			}
			if($bandPeriodista == "Periodista"){
				$sqlPeriodista = "INSERT INTO periodista (id, id_usuario) ";
                $sqlPeriodista .= "VALUES ('$usuario','$usuario')";
                if (insertDB($sqlPeriodista)) {
                    //header('Location: login.php');
                    $message = 'Insertado en periodista';
                } else {
                    $message = 'Error en periodista';
				}
				if($banderaVal == "Valido"){
					$sqlVal = "INSERT INTO valido (id, id_periodista, id_periodico, cedula) ";
					$sqlVal .= "VALUES ('$usuario','$usuario','$id_periodico','$cedula')";
					if (insertDB($sqlVal)) {
						//header('Location: login.php');
						$message = 'Insertado en valido';
					} else {
						$message = 'Error en valido';
					}
				}else{
					$message="no entre en valido";
				}
				if($banderaNoVal=="No valido"){
					$sqlVal = "INSERT INTO invalido (id, id_periodista, num_publicaciones) ";
					$sqlVal .= "VALUES ('$usuario','$usuario','$publicaciones')";
					if (insertDB($sqlVal)) {
						//header('Location: login.php');
						$message = 'Insertado en invalido';
					} else {
						$message = 'Error en invalido';
					}
				}

			}
        } else {

            $message = 'Las contrasenas no coinciden';
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/css/util.css">
	<link rel="stylesheet" type="text/css" href="/css/login1.css">
<!--===============================================================================================-->
</head>
<body>
<?php include("includes/navbar.php"); ?>
	
	<div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<!-- <div class="login100-form validate-form"> -->
				<span class="login100-form-title p-b-37">
					Sign up
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					
				<?php if (!empty($message)) : ?>
					<p> <?= $message ?></p>
				<?php endif; ?>
					<form action="sign_up.php" method="POST" enctype="multipart/form-data" class="login100-form">
						
                        <input class="input100" name="usuario" type="text" placeholder="Usuario" required value="">
						<input class="input100" name="nombre" type="text" placeholder="Nombre" required value="">
                        <input class="input100" name="ape_pat" type="text" placeholder="Apellido Paterno" required value="">
						<input class="input100" name="ape_mat" type="text" placeholder="Apellido Materno" required value="">
						<input class="input100" name="fecha" type="number" placeholder="Edad" required value="">
						<input class="input100" name="email" type="text" placeholder="Email" required value="">
						<input class="input100" name="telefono" type="number" placeholder="Teléfono" required value="">
                        <input class="input100" name="password" type="password" placeholder="Contraseña" required>
                        <input class="input100" name="confirm_password" type="password" placeholder="Confirmar Contraseña" required>
						<br>
						
						<input class="input100" name="us" type="text" placeholder="Tipo de Usuario:" disabled>
						<input type="checkbox" id="lectorCheck" name="lector" value="Lector">  Lector
						<input type="checkbox" id="periodistaCheck" name="periodista" value="Periodista">  Periodista

						<div id="lector">
						
						</div>
						<div id="periodista">
						
						</div>
						<div id="valido">

						</div>
						<div id="invalido">
							
						
						</div>

						<br>
                        <input class="login100-form-btn flex-c-b" type="submit" value="Enviar">
                    </form>
                    <span class="focus-input100"></span>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="/images/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="#" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			<!-- </div> -->
		</div>
	</div>
	
	

    <div id="dropDownSelect1"></div>
    <?php include("includes/footer1.php"); ?>
	
<!--===============================================================================================-->
	<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/bootstrap/js/popper.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/daterangepicker/moment.min.js"></script>
	<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/vendor/countdowntime/countdowntime.js"></script>
<!--<script src="/js/login1.js"></script>===============================================================================================-->
	
	<script>
		
		var band=0;
		const checkbox1 = $("#lectorCheck");
		const checkbox2 = $("#periodistaCheck");
		

		checkbox1.change(function(event) {
			
			if (event.target.checked) {
				//alert("entre");
				document.getElementById("periodista").innerHTML="";	
				var contenido=document.getElementById("lector");
				contenido.innerHTML+='<input class="input100" name="banderaLector" type="text" value="Lector"  required>'
				contenido.innerHTML+='<input class="input100" name="estado" type="text" placeholder="Estado favorito" required>';	
				
			} else {
				document.getElementById("lector").innerHTML="";
			}
		});
		checkbox2.change(function(event) {
			
			if (event.target.checked) {
				//alert("entre");
				document.getElementById("lector").innerHTML="";
				var contenido=document.getElementById("periodista");
				contenido.innerHTML='<input class="input100" name="usu" type="text" placeholder="Tipo de Periodista:" disabled>'+
							'<p>Nota: Un periodista valido es aquel que cuenta con experiencia en el rubro, ademas de contar con un '+
							'documento que lo avale. <br> Un periodista no valido no cuenta con experiencia y por ende '+
							'no cuenta con ningun documento que lo avale.</p>'+
							'<input class="input100" name="banderaPeriodista" type="text" value="Periodista"  required>'+
							'<input type="checkbox" id="validoCheck" name="valido" value="Valido"> Valido  '+
							'<input type="checkbox" id="invalidoCheck" name="invalido" value="Invalido"> No valido  ';
							const validoCheck=$("#validoCheck");
							const invalidoCheck=$("#invalidoCheck");
							validoCheck.change(function (event){
								if(event.target.checked){
									//alert("entre valido")
									document.getElementById("invalido").innerHTML="";
									var contenidoVal=document.getElementById("valido");
									contenidoVal.innerHTML='<br><p> <b> Sera necesario preguntar al periodico en el que '+
										'se trabaja para que le puedan brindar el id del periodico </b> </p>'+
										'<input class="input100" name="banderaValido" type="text" value="Valido"  required>'+
										'<input class="input100" name="idPeriodico" type="number" placeholder="Id del Periodico" required value="">'+
										'<input class="input100" name="cedula" type="text" placeholder="Cedula" required value="">';
								}else{
									document.getElementById("valido").innerHTML="";
								}

							});
							invalidoCheck.change(function (event){
								if(event.target.checked){
									//alert("entre invalido")
									document.getElementById("valido").innerHTML="";
									var contenidoInval=document.getElementById("invalido");
									contenidoInval.innerHTML='<input class="input100" name="banderaInvalido" type="text" placeholder="No valido" required value="No valido">'+
										'<input class="input100" name="publicaciones" type="number" placeholder="N° de publicaciones" required value="">';

								}else{
									document.getElementById("invalido").innerHTML="";
								}

							});

			} else {
				docuemnt.getElementById("periodista").innerHTML="";
				//Checkbox has been unchecked
			}
		});

		
	</script>

</body>
</html>