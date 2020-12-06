<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">TrueNews</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/php/index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Acerca de Nosotros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/php/login.php">Sing in/Sing up</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <?php if( isset($_SESSION['bandLector']) && $_SESSION['bandLector']==true ){?>
        <a href="add_noticia.php" style="color: white;" class="btn btn-default btn-flat">Membresia</a>
      <?php } ?>
      <?php if(isset ($_SESSION['bandUsuario'])){?>
        <a href="add_noticia.php" style="color: white;" class="btn btn-default btn-flat">Agregar noticia</a>
        <a href="MyBnoticias.php" style="color: white;" class="btn btn-default btn-flat">Editar noticia</a>
      <?php } ?>
      
      <?php if (isset($_SESSION["user_id"])) { ?> 
        <div class="nav-link">
          <a href="logout.php" style="color: white;" class="btn btn-default btn-flat">Sign out</a>
        </div>
      <?php } ?>
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php  ?>