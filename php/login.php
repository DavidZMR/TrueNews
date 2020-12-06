<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
  }
  require 'databaseLogin.php';

  if (!empty($_POST['username']) && !empty($_POST['pass'])) {
    $records = $conn->prepare('SELECT id, nombres,correo, pass FROM usuario WHERE correo = :username');
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = $_POST['pass'];

    if (count($results) > 0 && ($_POST['pass'] == $results['pass'])) {
		$_SESSION['bandLector']=false;
		$_SESSION['user_id'] = $results['id'];
		$band = $conn->prepare('SELECT id from valido where id=:id');
		$band->bindParam(':id', $results['id']);
		$band->execute();
		$res= $band->fetch(PDO::FETCH_ASSOC);
		// $bandera=$conn->prepare('SELECT id FROM usuario u inner join periodista p on u.id=p.id inner join valido v on p.id=v.id where v.id=:id');
		// $bandera->bindParam(':id', $results['id']);
		// $bandera->execute();
		// $res= $bandera->fetch(PDO::FETCH_ASSOC);
		if(/*count($res)>0 &&*/ $results['id']==$res['id']){
			$message="es valido";
			$_SESSION['bandUsuario']=true;
		}else{
			$band = $conn->prepare('SELECT id from invalido where id=:id');
			$band->bindParam(':id', $results['id']);
			$band->execute();
			$res= $band->fetch(PDO::FETCH_ASSOC);
            if (/*count($res)>0 &&*/ $results['id']==$res['id']) {
                $message="invalido";
                $_SESSION['bandUsuario']=false;
            }else{
				$message="lector";
				$_SESSION['bandLector']=true;
			}
		}
        //header("Location: index.php");
    } else {
      //$message = 'Perdón, ingrese nuevamente sus datos, el correo o la contraseña no coinciden';
    }
  }
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Log In</title>
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
<?php if (!empty($message)) : ?>
					<p> <?= $message ?></p>
				<?php endif; ?>
	
	<div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form" action="login.php" method="POST" enctype="multipart/form-data">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" >
					<input class="input100" type="text" name="username" placeholder="Usuario">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25">
					<input class="input100" type="password" name="pass" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					
					<input class="login100-form-btn" type="submit" value="Enviar">
					
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
					<a href="/php/sign_in.php" class="txt2 hov1">
					<a href="sign_up.php" class="txt2 hov1">
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
<!--===============================================================================================-->
	<script src="/js/login1.js"></script>

</body>
</html>