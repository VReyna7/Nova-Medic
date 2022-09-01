<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/viss.perfilProfesional.css">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    
   <?php
        require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.administrador.php');
        require_once('../modelo/class.userSession.php');
        
        error_reporting(0);

        $adm = new administrador();
        $userSession = new userSession();

	//verifica si la sesion esta iniciada
	if(isset($_SESSION['admin'])){
		$adm->setAdm($userSession->getCurrentAdm());	
	}else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
        $adm = new Administrador;
        $id = isset($_GET['id'])?$_GET['id']:"";
        $datos = $adm->mostrarPerfil($id);
    ?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido: <?php //echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <a href="vistaPublicacionesPro.html" class="links"><li class="buttons">Inicio</li></a>
                    <a href="vistaChatPro.html" class="links"><li class="buttons">Chat</li></a>
                    <a href="#" class="links"><li class="buttonActive">Perfil</li></a>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php //echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Profesional</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                                <img src="../css/img/foto-perfil.png" alt="Foto Perfil" class="fotoPerfil">
                                <input type="file" name="subir" value="Cambiar foto de perfil" class="submitFoto" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calification">
                    <div class="rate">
                        <h2>Calificación:</h2>
                    </div>
                    <div class="rating">
                        <input type="radio" name="star" id="star1" checked="checked">
                        <label for="star1"><img src="../css/img/1.png" ><h4>Terrible</h4></label>

                        <input type="radio" name="star" id="star2">
                        <label for="star2"><img src="../css/img/2.png"><h4>Malo</h4></label>

                        <input type="radio" name="star" id="star3">
                        <label for="star3"><img src="../css/img/3.png"><h4>Bueno</h4></label>

                        <input type="radio" name="star" id="star4">
                        <label for="star4"><img src="../css/img/4.png"><h4>Exelente</h4></label>

                        <input type="radio" name="star" id="star5">
                        <label for="star5"><img src="../css/img/5.png"><h4>Espectacular</h4></label>
                    </div>
                </div>
            </div>
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Información de Contacto</h2>
                        <a href="../vista/vis.modificarProfesional.php" class="edit">editar</a>
                    </div>
                    <?php
                        foreach ($datos as $datos){
                        echo '<div class="contName">';
                        echo '<h4>Nombre:</h4>';
                        echo '<h3>'. $datos['nombre'] .'</h3>';
                        echo '</div>';
                        echo '<div class="contLastN">';
                        echo '<h4>Apellido:</h4>';
                        echo '<h3>'. $datos['apellido'].'</h3>';
                        echo '</div>';
                    echo '<div class="contEmail">';
                        }
                    ?>
                        </div>
                    </div>
        <form action="vistaPublicaciones.html" method="POST">
            <div id="popup" class="overlay">
           
           <div id="popupBody">
               <div class="caja1">
                   <img src="../css/img/logo rent a professional.png" alt="Rent a Professional">
               </div>
               <a id="cerrar" href="#">&times;</a>
              
               <div class="caja2">
                   <input type="text" placeholder="Tìtulo del reporte:" id="titulo" name="titulo">
                   <input type="text" placeholder="Descripciòn:" id="descripcion" name="descripcion" class="Dess">                   
               </div>
               <div class="caja3">
               <input type="submit" value="Publicar" name="publicar">
               </div>
               </div>
           </div>
           </form>
        </div>         
                </div> 
            </div>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div> 
    </div>   
</body>
</html>

