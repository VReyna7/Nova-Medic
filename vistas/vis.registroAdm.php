<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<section>
		<form method="POST" action="../controlador/insertarAdm.php">
			<input type="text" name="nombre" placeholder="Nombre:" autocomplete="off" required>
			<input type="text" name="apellido" placeholder="Apellido:" autocomplete="off" required>
			<input type="email" name="correo" placeholder="Correo:" autocomplete="off" required>
			<input type="password" name="pass" placeholder="Contraseña:" autocomplete="off" required>
			<input type="password" name="passV" placeholder="Verifique su contraseña:" autocomplete="off" required>
			<input type="date" name="fechaNac" placeholder="Fecha de nacimiento:" autocomplete="off" required>
			<?php
			if(isset($errorReg)){
				echo "<p class='error'>".$errorReg."</p>";
			}
			?>
			<input type="submit" value="Enviar"  required>
		</form>
	</section>	
</body>
</html>
