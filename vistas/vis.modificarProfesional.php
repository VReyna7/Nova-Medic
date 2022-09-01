<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.profecional.php");
	require_once("../modelo/class.userSession.php");
	
	error_reporting(0);

	$prof= new Profesional();
	$userSesion =new userSession();
	if(isset($_SESSION['profesional'])){
		//echo "hay sesion de un profecional";
		$prof->setProfesional($userSesion->getCurrentProfesional());
	}else{
		echo "no hay sesion";
	}
	?>
</head>
<body>
	<section>
	<h1>Aqui modifica sus datos <?php $prof->getNombre();?></h1>
		<form method="POST" action="../controlador/modificarProfesional.php">
			<!--<input type="password" name="pass" placeholder="Confirme su contraseña" required autocomplete="off">-->
			<input type="text" name="nombre" placeholder="Su nombre nuevo" required autocomplete="off">
			<input type="text" name="apellido" placeholder="Su apellido nuevo" required autocomplete="off">
			<input type="email" name="mail" placeholder="Su correo nuevo" required autocomplete="off">
			<input type="submit" value="Modificar datos">
		</form>
	</section>	
</body>
</html>
