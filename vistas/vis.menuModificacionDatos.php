<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.menuModificacionDatos.css?v=<?php echo time();?>"/>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Document</title>
	<?php
        require_once("../modelo/class.conexion.php");
        require_once("../modelo/class.profecional.php");
        require_once("../modelo/class.cliente.php");
        require_once("../modelo/class.userSession.php");
        require_once("../modelo/class.administrador.php");
        
        error_reporting(0);

        $userSesion =new userSession();

        if(isset($_SESSION['profesional'])){
            $user = new Profesional();
            $user->setProfesional($userSesion->getCurrentProfesional());
            $menu = "prof";
        }elseif(isset($_SESSION['cliente'])){
            $user = new Cliente();
            $user->setCliente($userSesion->getCurrentCliente());
            $menu = "client";
        }elseif(isset($_SESSION['admin'])){
            $user = new Administrador();
            $user->setAdm($userSesion->getCurrentAdm());
            $menu = "admin";
            //header("location: ../vistas/vis.inicioSesion.php");
        }
    ?>

</head>
<body>
    <div class="containerKing">
        <div class="header">
		<h3 class="nombreUsuario">Bienvenido: <?php echo $user->getNombre(). " ". $user->getApellido();?></h3>
            <button class="endSesion"><a href="#">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                <?php 
                    if($menu == "prof"){
                        echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                        <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                        <a href="vis.perfilProfesional.php" class="links"><li class="buttonActive">Perfil</li></a>';
                    }elseif($menu == "client") {
                        echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                        <a href="vis.listadoChats.php" class="links"><li class="buttons">Mis Publicaciones</li></a>
                        <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                        <a href="vis.perfilCliente.php" class="links"><li class="buttonActive">Perfil</li></a>';
                    }elseif ($user->getContador() == 1 && $menu == "admin") {
                        echo '<a href="vis.perfilAdministrador.php" class="links"><li class="buttons">Perfil</li></a>
                        <a href="#" class="links"><li class="buttonActive">Reportes</li></a>
                        <a href="vis.listadoAdministrador.php" class="links"><li class="buttons">Administradores</li></a>';
                    }
                ?>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $user->getNombre(). " ". $user->getApellido();?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="contenido">
                <h3>Seleccione los datos a modificar</h3>
            </div>
            <div class="opciones">
                <button><a href="vis.modificarContrasena.php">Modificar Contraseña</a></button>
                <button><a href="vis.modificarCorreo.php">Modificar Correo</a></button>
                <button><a href="vis.modificarNombre.php">Modificar Nombre</a></button>
            </div>
        </div>
    </div>
</body>
</html>
