<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.listadoChat.css?v=<?php echo time(); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Administradores-Listado</title>
    <?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.cliente.php');
	require_once('../modelo/class.userSession.php');
    require_once('../modelo/class.administrador.php');
    require_once('../modelo/class.profecional.php');
    require_once('../modelo/class.publicacion.php');
    require_once('../modelo/class.fotoCliente.php');
    require_once('../modelo/class.fotoProfeional.php');
    require_once("../modelo/class.chat.php");
    
	$adm = new Administrador();
	$userSession = new userSession();
    $chat = new Chat();
    error_reporting(0);
	//verifica si la sesion esta iniciada
	if(isset($_SESSION['profesional'])){
		$prof = new Profesional();
        $profs = false;
        $pub = new Publicacion;
        $prof->setProfesional($userSession->getCurrentProfesional());
        $resultadoFoto = new clienteFoto();
    }elseif(isset($_SESSION['cliente'])){
		$clnt = new Cliente();
        $profs = true;
        $clnt->setCliente($userSession->getCurrentCliente());
        $resultadoFoto = new profeionalFoto();
    }else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
	?>

    <script>
        function ajax(){
            setInterval(function(){ajax();, 1000});
        }
    </script>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido: <?php   if($profs){ echo $clnt->getNombre(). " ". $clnt->getApellido(); }else{ echo $prof->getNombre(). " ". $prof->getApellido();}   ?> </h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                <?php
                    if(!$profs){
                    echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                    <a href="vis.listadoChats.php" class="links"><li class="buttonActive">Chats</li></a>
                    
                    <a href="vis.perfilProfesional.php" class="links"><li class="buttons">Perfil</li></a>';
                    }else{
                    echo '<a href="vis.publicaciones.php" class="links"><li class="buttons">Inicio</li></a>
                    <a href="vis.Mispublicaciones.php" class="links"><li class="buttons">Mis publicaciones</li></a>
                    <a href="vis.listadoChats.php" class="links"><li class="buttonActive">Chats</li></a>
                    <a href="vis.perfilCliente.php" class="links"><li class="buttons">Perfil</li></a>';
                    }
                ?>
                </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido: <?php   if($profs){$clnt->getNombre(). " ". $clnt->getApellido();}else{$prof->getNombre(). " ". $prof->getApellido();}  ?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="container">
            <div class="contInfo">
                    <div class="contInfoTitulo">
                        <h2>Chats</h2>
                    </div>
            </div>
            <?php
                if(!$profs){
                    $chats = $prof->verChat($prof->getNombre(), $prof->getApellido());
                }else{
                    $chats = $clnt->verChat($clnt->getNombre(), $clnt->getApellido());
                }
                if(!$profs){
                    foreach($chats as $chats){
                $enlace = "<a class='nombre' href='../vistas/vis.perfilCliente.php?&id=".$chats['idC']."'>";
                $enlace2 = "<a class='nombre' href='../vistas/vis.chat.php?&id=".$chats['idC']."'>";        
                echo  '<div class="Listchats">';
                if (empty($resultadoFoto->Foto($chats['idC']))){
                    echo '<img src="../css/img/fotoperfil.png" class="fotoPerfil">';
                }else{
                    echo "<img src='".$resultadoFoto->Foto($chats['idC'])."' class='fotoPerfil'>";
                }
                $data = $chat->verUltimoMsg($chats["idP"],$chats["idC"]);
                echo '<div class="nameChat">';
                echo $enlace.'<label class="namelist">'.$chats["nameC"]." ".$chats["apeC"].'</label></a>';
                if (empty($data['msg'])){
                    echo '<label class="ultimomsg">Ultimo mensaje: No hay mensajes </label>';
                }else{
                    echo '<label class="ultimomsg">Ultimo mensaje: '.$data['msg'].'</label>';
                }
               echo "</div>";
               echo $enlace2.'<div class="chatsbutt"><input class="Chatbutton" value="Ir al Chat" type="button"></a></div>';
               echo "</div>";
                    }
            }else{
                foreach($chats as $chats){
                    $data = $chat->verUltimoMsg($chats["idP"],$chats["idC"]);
                    $enlace = "<a class='nombre' href='../vistas/vis.perfilProfesional.php?&id=".$chats['idP']."'>";
                    $enlace2 = "<a class='nombre' href='../vistas/vis.chat.php?&id=".$chats['idP']."'>";        
                    echo  '<div class="Listchats">';
                    echo "<img src='".$resultadoFoto->Foto($chats['idP'])."' class='fotoPerfil'>";
                    echo '<div class="nameChat">';
                    echo $enlace."<label class='namelist'>".$chats['nameP']." ".$chats['apeP']."</label></a>";
                    if (empty($data['msg'])){
                        echo '<label class="ultimomsg">Ultimo mensaje: No hay mensajes </label>';
                    }else{
                        echo '<label class="ultimomsg">Ultimo mensaje: '.$data['msg'].'</label>';
                    }
                   echo "</div>";
                   echo '<div class="chatsbutt">'.$enlace2.'<input class="Chatbutton" value="Ir al Chat" type="button"></a></div>';
                   echo "</div>";
            }
        }
            ?>
            <button class="endSesion2"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
    </div>
</body>
</html>
