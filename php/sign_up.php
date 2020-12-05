<?php
	require 'conexionMYSQL.php';
	$servername = "localhost";
$database = "truenews";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
	$message = '';
	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
	$ape_pat = isset($_POST['ape_pat']) ? $_POST['ape_pat'] : "";
	$ape_mat = isset($_POST['ape_mat']) ? $_POST['ape_mat'] : "";
	$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
	//lector
	$bandLector = isset($_POST['banderaLector']) ? $_POST['banderaLector'] :"";
	$estado = isset($_POST['estado']) ? $_POST['estado'] : "";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $password = $_POST['password'];
            $sql = "INSERT INTO usuario(id,nombres,ap_pa,ap_ma,edad,correo,tel,pass) VALUES ('$usuario', '$nombre', '$ape_pat', '$ape_mat', '$fecha','$email', '$telefono','$password')";
			mysqli_query($conn,$sql);
            if (insertDB($sql)) {
                header('Location: login.php?s=1');
                $message = 'Insertado en usuario';
            } else {
                $message = 'Error en usuario';
            }

            if ($bandLector == 'Lector'){
                $sqlLector = "INSERT INTO lector (id, id_usuario, estado)";
				$sqlLector .= " VALUES ('$usuario','$usuario','$estado')";
                if (insertDB($sqlLector)) {
                    header('Location: login.php');
                    $message = 'Insertado en Lector';
                } else {
                    $message = 'Error en lector';
                }
            }
        } else {
            $message = 'Las contrasenas no coinciden';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
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
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Sign up
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					
				<?php if (!empty($message)) : ?>
					<p> <?= $message ?></p>
				<?php endif; ?>
                    <form action="sing_up.php" method="POST">
                        <input class="input100" name="usuario" type="text" placeholder="Usuario" required value="">
						<input class="input100" name="nombre" type="text" placeholder="Nombre" required value="">
                        <input class="input100" name="ape_pat" type="text" placeholder="Apellido Paterno" required value="">
						<input class="input100" name="ape_mat" type="text" placeholder="Apellido Materno" required value="">
						<input class="input100" name="fecha" type="number" placeholder="Fecha nac." required value="">
						<input class="input100" name="email" type="text" placeholder="Email" required value="">
						<input class="input100" name="telefono" type="number" placeholder="Telefono" required value="">
                        <input class="input100" name="password" type="password" placeholder="Contraseña" required>
                        <input class="input100" name="confirm_password" type="password" placeholder="Confirmar Contraseña" required>
						<br>
						
						<input class="input100" name="us" type="text" placeholder="Tipo de Usuario:" disabled>
						<input type="checkbox" id="lectorCheck" name="lector" value="Lector">Lector
						<input type="checkbox" id="periodistaCheck" name="periodista" value="Periodista">Periodista

						<div id="lector">
						
						</div>
						<div id="periodista">

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
			</form>

			
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
				alert("entre");
				document.getElementById("periodista").innerHTML="";	
				var contenido=document.getElementById("lector");
				contenido.innerHTML+='<input class="input100" name="banderaLector" type="text" value="Lector"  disabled>'
				contenido.innerHTML+='<input class="input100" name="estado" type="text" placeholder="Estado favorito" required>';	
			} else {
				document.getElementById("lector").innerHTML="";
			}
		});
		checkbox2.change(function(event) {
			
			if (event.target.checked) {
				alert("entre");
				document.getElementById("lector").innerHTML="";
			} else {
				//Checkbox has been unchecked
			}
		});
		

		function fun_lector(){
			band=1;
			alert("entre")
			document.getElementById("periodista").innerHTML="";	
			
		}
		function fun_periodista(){
			band=2;
			
			document.getElementById("lector").innerHTML="";
		}
	</script>

</body>
</html>