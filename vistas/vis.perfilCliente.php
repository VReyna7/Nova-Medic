<?php 
session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.perfilCliente.css?v=<?php echo time();?>"/>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
	<?php
		require_once('../modelo/class.conexion.php');
        require_once('../modelo/class.cliente.php');
        require_once('../modelo/class.fotoCliente.php');
        require_once('../modelo/class.userSession.php');
        require_once('../modelo/class.administrador.php');
        require_once('../modelo/class.profecional.php');
        

        
        $resultadoFoto = new clienteFoto();
        $adm = new Administrador();
        $userSession = new userSession();
   
		$idC = $_GET['id'];

        if(isset($_SESSION['cliente']) && !isset($id)){
        	$clnt = new Cliente();
            $userV = false;
            $clnt->setCliente($userSession->getCurrentCliente());	
        }elseif(isset($_SESSION['profesional']) && isset($idC) || isset($_SESSION['cliente']) && isset($idC)){
			$clnt = new Cliente();
            $prof = new Profesional();
			$clnt->mostrarPerfil($idC);
			$userV = true;
            $prof->setId($userSession->getCurrentProfesional());
            $idP = $prof->getId();
		}else{
            header("location: ../vistas/vis.inicioSesion.php");
        }
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
		<h3 class="nombreUsuario"><?php if($userV != true) echo "Bienvenido:" ?> <?php echo $clnt->getNombre(). " ". $clnt->getApellido();?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                <?php
                        if($userV != false){
                            echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                             <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                             <a href="vis.perfilProfesional.php" class="links"><li class="buttonActive">Perfil</li></a>';
                        }else{
                            echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                            <a href="vis.Mispublicaciones.php" class="links"><li class="buttons">Mis publicaciones</li></a>
                             <a href="vis.listadoChats.php" class="links"><li class="buttons">Chats</li></a>
                             <a href="vis.perfilCliente.php" class="links"><li class="buttonActive">Perfil</li></a>';
                             
                        } 
                        ?> 
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="container2">
                <div class="subContainer">
                    <div class="contProfile">
                        <div class="contProfTit">
                            <h2>Cliente</h2>
                        </div>
                        <div class="contenidoProfile">
                            <div class="contFormProfile">
                            <?php
                              echo "<img src='".$resultadoFoto->Foto($clnt->getId())."' width='300' heigth='100' class='fotoPerfil'>";
                              if($userV == false){

                                echo '<form action="../controlador/ctrlfotoCliente.php" method="POST" enctype="multipart/form-data">
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
            </div>
            <div class="contInfo">
                <div class="contDetails">
                    <div class="contInfoTitulo">
                        <h2>Información de Contacto</h2>
			<?php if($userV != true) echo '<a href="vis.menuModificacionDatos.php" class="edit">editar</a>'?>
                    </div>
                    <div class="contName">
                        <h4>Nombre:</h4>
						<h3><?php echo $clnt->getNombre()?></h3>
                    </div>
                    <div class="contLastN">
                        <h4>Apellido:</h4>
						<h3><?php echo $clnt->getApellido()?></h3>
                    </div>
                    <div class="contEmail">
                        <h4>Correo Electrónico:</h4>
						<h3><?php echo $clnt->getCorreo()?></h3>
                    </div>
                    <div class="contDate">
                        <h4>Fecha de Nacimiento:</h4>
						<h3><?php echo $clnt->getFechaNac()?></h3>
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
                    <div>
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
               <input type="hidden" name="tipo" value="Client">
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

