<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://kit.fontawesome.com/2997da40e1.js" crossorigin="anonymous"></script>
	<title></title>
	<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.administrador.php");
	require_once("../modelo/class.userSession.php");

    error_reporting(0);

	$adm = new Administrador();
	$userSession = new userSession();

	if(isset($_SESSION['admin'])){
		$adm->setAdm($userSession->getCurrentAdm());
	}else{
		header('location: ../vistas/vis.inicioSesion.php');
	}
	?>
</head>
<body>
	<section>
		<h1>Listado cliente</h1>
		<table>
			<th>ID</th>
			<th>Nombre completo</th>
			<th>Correo</th>
			<?php
			$listas = $adm->listadoCliente();
			$enlace = "<a href='../controlador/adminitracion.php?accion=eliminar&id=";
			foreach($listas as $lista){
			echo "<tr><td>".$lista['id']."</td><td>".$lista['nombre'] . " " .$lista['apellido'] . "</td><td>". $lista['correo'] ."<td/><td>".$enlace.$lista['id']."'><i class='fas fa-trash'></i></a</td></tr>";	
			}
			?>
		</table>
	</section>	
</body>
</html>
