<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Reportes.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <script defer src="../JavaScript/menuHamburguesa.js"></script>
    <title>Reportes</title>
    <?php
	require_once('../modelo/class.conexion.php');
	require_once('../modelo/class.administrador.php');
	require_once('../modelo/class.userSession.php');
    
    error_reporting(0);

	$adm = new Administrador();
	$userSession = new userSession();

	//verifica si la sesion esta iniciada
	if(isset($_SESSION['admin'])){
		$adm->setAdm($userSession->getCurrentAdm());	
	}else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
	?>
</head>
<body>
    <div class="containerKing">
        <div class="header">
            <h3 class="nombreUsuario">Bienvenido: <?php echo $adm->getNombre() ." " . $adm->getApellido()?></h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <header class="encabezado">
            <nav class="navigationBar">
                <button class="nav-toggle" aria-label="Abrir menú"><i class="fas fa-bars"></i></button>
                <ul class="navButtons">
                <a href="#" class="links"><li class="buttonActive">Reportes</li></a>
                <a href="vis.listadoAdministrador.php" class="links"><li class="buttons">Administradores</li></a>
                <a href="vis.perfilAdministrador.php" class="links"><li class="buttons">Perfil</li></a>     
            </ul>
            </nav>
        </header>
        <div class="header2">
            <h3 class="nombreUsuario">Bienvenido:</h3>
            <button class="endSesion"><a href="../controlador/cerrarSesion.php">Cerrar Sesión</a></button>
        </div>
        <div class="Reportes">
            <?php
                require_once '../modelo/Class.Reportes.php';
                $Reportes  = new Reportes();
                $reporte = $Reportes->mostrarReportes();
                foreach($reporte as $mostrar){
                if ($mostrar['reportado'] == "Prof"){
                echo '<div class="ReportesCont">'.
                    '<label class="UsuName">'.'Reportante: '.'<label class="Reportante">'.$Reportes->getNombreCompleto($mostrar['idClient']).'</label></label>'.
                    '<label class="ReportTitulo">'.'Titulo: '.'<label class="titulo">'. $mostrar['titulo']. '</label>'.'</label>'.
                    '<label class="ReportDescripcion">'.'Descripción: <br/>'.'</label>'.
                    '<p class="descripcion">'.$mostrar['descripcion'].'</p>'.
                    '<label class="UsuName">'.'Reportado: '.'<label class="Reportante">'.$Reportes->getNombreCompletoP($mostrar['idPro']).'</label></label>';
                    echo '<label class="UsuName">Rol: Profesional</label>';
                    $enlace = '<a href="../controlador/CtrlBanDel.php?accion=eliminar&id=';
                    $enlace2 = '<a href="../controlador/CtrlBanDel.php?accion=BanearPro&id=';
                    echo $enlace.$mostrar['Id'].'&idRe='.$mostrar['Id'].'"><button class="butdelete">Eliminar</button></a>';
                    echo $enlace2.$mostrar['idPro'].'&idRe='.$mostrar['Id'].'"><input type="button" onclick="mensaje()" value="Banear" class="butbanear"/></a></div>';
                    echo '<script>
                    function mensaje(){
                        alert("El usuario ha sido baneado, el reporte se eliminara");
                    }
                    </script>';
                }else{
                    echo '<div class="ReportesCont">'.
                    '<label class="UsuName">'.'Reportante: '.'<label class="Reportante">'.$Reportes->getNombreCompletoP($mostrar['idPro']).'</label></label>'.
                    '<label class="ReportTitulo">'.'Titulo: '.'<label class="titulo">'. $mostrar['titulo']. '</label>'.'</label>'.
                    '<label class="ReportDescripcion">'.'Descripción: <br/>'.'</label>'.
                    '<p class="descripcion">'.$mostrar['descripcion'].'</p>'.
                    '<label class="UsuName">'.'Reportado: '.'<label class="Reportante">'.$Reportes->getNombreCompleto($mostrar['idClient']).'</label></label>';
                    echo '<label class="UsuName">Rol: Cliente</label>';
                    $enlace = '<a href="../controlador/adminitracion.php?accion=eliminar&id=';
                    $enlace2 = '<a href="../controlador/adminitracion.php?accion=BanearClient&id=';
                    echo $enlace.$mostrar['Id'].'"><button class="butdelete" >Eliminar</button></a>';
                    echo $enlace2.$mostrar['idPro'].'&idRe='.$mostrar['Id'].'"><input type="button" onclick="mensaje()" value="Banear" class="butbanear"/></a></div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>