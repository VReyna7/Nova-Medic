<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.perfilProfesional.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
        <?php
        error_reporting(0);
        require_once('../modelo/class.userSession.php');
        require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.profecional.php');
        require_once('../modelo/class.cliente.php');
        require_once('../modelo/class.curriculo.php');
        require_once('../modelo/class.fotoProfeional.php');
        
        error_reporting(0);

        $userSession = new userSession();
        $resultadoFoto = new profeionalFoto();
        $doc = new Curriculo();
		$idP = $_GET['id'];

        if(isset($_SESSION['profesional']) && !isset($idP)){
        	$prof = new Profesional();
            $prof->setProfesional($userSession->getCurrentProfesional());	
		}elseif(isset($_SESSION['profesional']) && isset($idP) || isset($_SESSION['cliente']) && isset($idP)){
			$prof = new Profesional();
            $clnt = new Cliente();
            $clnt->setId($userSession->getCurrentCliente());
            $idC = $clnt->getId();
			$prof->mostrarPerfil($idP);
			$userV = true;
		}else{
            header("location: ../vistas/vis.inicioSesion.php");
        }
    ?>

</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario"><?php if($userV != true) echo "Bienvenido:" ?> <?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                    <?php
                        if($userV != false){
                            echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                            <a href="vis.listadoChats.php" class="links"><li class="buttons">Mis Publicaciones</li></a>
                             <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                             <a href="vis.perfilCliente.php" class="links"><li class="buttonActive">Perfil</li></a>';
                        }else{
                            echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                             <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                             <a href="vis.perfilProfesional.php" class="links"><li class="buttonActive">Perfil</li></a>';
                        }  
                    ?>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $prof->getNombre(). ' ' .$prof->getApellido();; ?> </h3>
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
                                <?php
                                    echo "<img src='".$resultadoFoto->Foto($prof->getId())."' width='300' heigth='100' class='fotoPerfil'>";
                                    if($userV == false){
                                    echo '<form action="../controlador/ctrlfotoProfesional.php" method="POST" enctype="multipart/form-data">
                                        <br>
                                        <input type="file" name="foto" id="foto" accept=".jpg, .png" class="bottonImage">
                                        <br>
                                        <input type="submit" name="enviar" value="Enviar" class="submitFoto">
                                        </form>';
                                    }
                                ?> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="calification">
                    <div class="rate">
                        <h2>Calificación:</h2>
                    </div>
                    <div class="rating">
                        <input type="radio" name="star" id="star1" checked="checked">
                        <label for="star1"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>
                        <input type="checkbox" value="1" id="star1" checked>
                        <input type="radio" name="star" id="star2">
                        <label for="star2"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <input type="radio" name="star" id="star3">
                        <label for="star3"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <input type="radio" name="star" id="star4">
                        <label for="star4"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>

                        <input type="radio" name="star" id="star5">
                        <label for="star5"><span class="fa fa-star" id="star" onclick="rate(this)"></span></label>
                    </div>
                    Script para validar el sistema de califiación
                </div>-->
            </div>
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Información de Contacto</h2>
					<?php if($userV != true) echo '<a href="vis.menuModificacionDatos.php" class="edit">editar</a>'?>
                    </div>
                    <div class="contName">
                        <h4>Nombre:</h4>
                        <h3><?php echo $prof->getNombre(); ?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
                        <h3><?php echo $prof->getApellido(); ?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
                        <h3><?php echo $prof->getCorreo(); ?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
                        <h3><?php echo $prof->getFechaNac(); ?></h3>
                    </div>
                    <div class="curriculum">
                        <h4>Curriculum:</h4>
                        <?php echo "<h2 class'curri'><a href='". $doc->getDocNombre($prof->getId()). "' target='_blank'>Ver Curriculo</a></h2>"; ?>
                    </div>
                    <div>
                        <?php
                            if($userV != false){
                                echo '<div class="containerHijo1">';
                                echo '<button onclick="'."location.href='#popup'".'" class="publicar">Reportar</button>';
                                echo '</div>';
                            }
                        ?>    
                    </div>
                </div>
            </div>
            <form action="../controlador/ctrlReportes.php" method="post">
        <div id="popup" class="overlay">
       
       <div id="popupBody">
           <div class="caja1">
               <img src="../css/img/logo.png" alt="Rent a Professional">
           </div>
           <a id="cerrar" href="#">&times;</a>
          
           <div class="caja2">
               <input type="text" placeholder="Título:" id="titulo" name="titulo" required>
               <input type="text" placeholder="Descripción:" id="descripcion" name="descripcion" class="Dess" required>
               <input type="hidden" name="idClient" value="<?php echo $idC; ?>">   
               <input type="hidden" name="idPro" value="<?php echo $idP; ?>">  
               <input type="hidden" name="tipo" value="Prof">
           </div>
           <h5>ATENCIÓN: Luego del Reporte sera trasferido a la pagina de chats</h5>
           <div class="caja3">
           <input type="submit" value="Reportar" name="publicar">
           </div>
           </div>
       </div>
       </form>  
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div> 
    </div>   
</body>
</html>

