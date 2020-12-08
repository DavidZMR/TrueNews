<?php
if(!isset($_SESSION)){
	session_start();
}
require 'conexionMYSQL.php';
?>
<!doctype html>
<html lang="es">

<head>
    <style>
        img {
            width: 180px;
            height: 120px;
        }
    </style>
    <title>Sidebar 06</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/utilEditar.css">
    <link rel="stylesheet" type="text/css" href="/css/mainEditar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/adminstyle.css">
</head>

<body><?php include("includes/navbar.php"); ?>

    <div class="container d-flex align-items-stretch">
        <nav id="sidebar" class="img" style="background-image: url(/images/bg_1.jpg);">
            <div class="p-4">
                <h1><a href="index.php" class="logo">True <span> News</span></a></h1>
                <h5>Opciones</h5>
                <ul class="list-unstyled components mb-5">
                    <li class="active"><br>
                        <button class="btn btn-outline-dark" onclick="usuario();"> Modificacion y bajas de
                            usuarios</button>
                    </li>
                    <li><br><br><br>
                        <button class="btn btn-outline-dark" onclick="noticias();"> Bajas de Noticias</button>
                    </li>
                    <!-- <li>
                    <button class="btn btn-outline-dark"> </button>
                    </li> -->
                    <!--<li>
                        <a href="#"><span class="fa fa-sticky-note mr-3"></span> Blog</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-cogs mr-3"></span> Services</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contacts</a>
                    </li>
                </ul> -->
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div id="contenedorUsuario">
                <h2 class="mb-4">Bienvenido Admin</h2>
                <h4>Aqui podras realizar distintas tareas</h4>
                
            </div>
            <div class="limiter">
                <div id="contenedorNoticias" class="p-2">
                                


                </div>
            </div>    
        </div>
    </div>
    <?php include("includes/footer1.php"); ?>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script>
        function modificarUsu(){
            
        }
        function eliminarUsu(){

        }
        function usuario() {
            document.getElementById("contenedorNoticias").innerHTML = "";
            var cont = document.getElementById("contenedorUsuario");
            cont.innerHTML = '<div class="limiter">'+
                    '<div class="container-table100">'+
                        '<h4>Los Usuarios son los siguientes</h4>'+
                        '<div class="wrap-table100">'+
                            '<div class="table100 ver1">'+
                                '<div class="table100-firstcol">'+
                                    '<table>'+
                                        '<thead>'+
                                            '<tr class="row100 head">'+
                                                '<th class="cell100 column1">Usuario</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                            <?php 
                                    $conexion=conexion();
                                    $sql1 = "SELECT * from usuario";
                                    
                                    $res = mysqli_query($conexion, $sql1);
                                    
                                while ($mostrar = mysqli_fetch_array($res)){?>
                                            '<tr class="row100 body">'+

                                                '<td class="cell100 column1"><br><br><br><br><br> <?php echo $mostrar['id'];?></td>'+

                                            '</tr>'+
                                            <?php } ?>
                                        '</tbody>'+
                                   ' </table>'+
                                '</div>'+

                                '<div class="wrap-table100-nextcols js-pscroll">'+
                                    '<div class="table100-nextcols">'+
                                        '<table>'+
                                           ' <thead>'+
                                                '<tr class="row100 head">'+
                                                    '<th class="cell100 column6">Nombre</th>'+
                                                    '<th class="cell100 column6">Apellido Paterno</th>'+
                                                    '<th class="cell100 column6">Apellido Materno</th>'+
                                                    '<th class="cell100 column6">Edad</th>'+
                                                    '<th class="cell100 column6">Correo Electronico</th>'+
                                                    '<th class="cell100 column6">Telefono</th>'+
                                                    '<th class="cell100 column6">Contraseña</th>'+



                                                '</tr>'+

                                            '</thead>'+
                                           ' <tbody>'+
                                                <?php 
                                                $conexion=conexion();
                                                $sql1 = "SELECT * from usuario";
                                                
                                                $res = mysqli_query($conexion, $sql1);
                                                while ($mostrar = mysqli_fetch_array($res)){?>
                                                '<tr class="row100 body">'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['nombres']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['ap_pa']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['ap_ma']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['edad']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['correo']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['tel']?></td>'+
                                                    '<td class="cell100 column6"><?php echo $mostrar['pass']?></td>'+
                                                    '<td><button class="btn btn-outline-danger" onclick="eliminarUsu(<?php echo $mostrar['id']?>)">Eliminar cuenta</button>'+
                                                        '<button class="btn btn-outline-dark" onclick="modificarUsu(<?php echo $mostrar['id']?>)">Modificar cuenta</button></td>'+

                                                '</tr>'+
                                                <?php } ?>

                                            '</tbody>'+
                                        '</table>'+

                                   ' </div>'+
                                '</div>'+
                            '</div>'+

                            '<br><br>'+
                            '<h6>¿Deseas realizar cambios?</h6> <br>'+
                            
                            '<br>'+
                            '<div id="contenedor">'+

                            '</div>'+
                        '</div>'+
                        
                    '</div>'+
                '</div>';
        }
        function noticias(){
            document.getElementById("contenedorUsuario").innerHTML="";
            var cont=document.getElementById("contenedorNoticias");
            cont.innerHTML='<div id="row-full noticias">'+
                                '<div class="col-12">'+
                                    <?php
                
                                            $conn = conexion();
                                            
                                            $sql = "SELECT * FROM noticia order by fecha desc";
                                            $res = mysqli_query($conn,$sql);
                                            
                                            ?>
                                    '<div class="row contorno mt-5">'+
                                                                    <?php
                                            while($mostrar = mysqli_fetch_array($res)){
                                                
                                                ?>
                                        '<div class="col-sm-3">'+
                                            '<img class="img_noticia" src="<?php echo $mostrar['img'];?>" alt=""><br><br>'+
                                            '<button class="mr-3 btn btn-outline-dark" onclick="modificar(<?php echo $mostrar['id'];?>,<?php echo $mostrar['id_lugar']?>)">Modificar</button><br><br>'+
                                            '<button class="mr-3 btn btn-outline-dark" onclick="eliminar(<?php echo $mostrar['id']?>)">Eliminar</button><br><br>'+
                                            '<button class="mr-3 btn btn-outline-dark" onclick="involucrados(<?php echo $mostrar['id']?>)">Editar Involucrados</button>'+
                                        '</div>'+
                                        '<div class="col-sm-3">'+
                                            '<h2 class="titulos"><?php echo $mostrar['titulo']; ?></h2>'+
                                            '<p><?php echo $mostrar['descripcion']; ?></p>'+
                                            '<p><?php echo $mostrar['fecha']; ?></p>'+
                                        '</div>'+
                                        <?php } ?>
                                    '</div>'+
                                '</div>'+
                            '</div>';
        }

        function eliminar(id) {
            var xhttp1 = new XMLHttpRequest();
            xhttp1.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.response != "error") {
                        //document.getElementById("contenido").innerHTML=tipo1;

                    } else {

                    }
                }
            };
            xhttp1.open("GET", "eliminaNoticia.php?id=" + id, true);
            xhttp1.send();
            location.reload();
        }

        function involucrados(id) {
            location.href = "MyBinvolucrados.php?id=" + id;
        }

        function modificar(id, id_lugar) {

            location.href = "modificarNoticia.php?id=" + id + "&id_lugar=" + id_lugar;
        }
    </script>
    <script>
        $('.js-pscroll').each(function () {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function () {
                ps.update();
            })

            $(this).on('ps-x-reach-start', function () {
                $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
            });

            $(this).on('ps-scroll-x', function () {
                $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
            });

        });
    </script>
    <!--===============================================================================================-->
    <script src="/js/mainEditar.js"></script>

</body>

</html>