<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.registroCliente.css?v=<?php echo time();?>"/>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <title>Rent a Professional - RAP</title>
</head>
<body>
    <div class="containerRegis">
        <header>
            <h2>Registro</h2>
        </header>
        <form class="form" method="POST" action="../controlador/insertarCliente.php">
            <input type="text" name="nombre" placeholder="Nombre" class="nombres" required>
            <input type="text" name="apellido" placeholder="Apellido" class="apellidos" required>
            <input type="email" name="mail" placeholder="Correo Electrónico" class="e-mail" required>
            <input type="password" name="pass" placeholder="Contraseña" class="password" required>
            <input type="password" name="passV" placeholder="Verificar Contraseña" class="verf-password" required>
            <input type="date" name="fechaNac" class="date" required></br></br>
			<p class="linked"><?php if(isset($errorReg)) echo $errorReg; ?></p>
            <input type="submit" value="Registrarse" class="registrarse">
        </form>
        <a href="vis.inicioSesion.php" class="linked">¿Tienes una cuenta? Inicia Sesión</a>
    </div>
</body>
</html>
<!--<form class="form">
            <input type="text" placeholder="Nombres" class="nombres" required>
            <input type="text" placeholder="Apellidos" class="apellidos" required>
            <input type="email" placeholder="Correo Electrónico" class="e-mail" required>
            <input type="password" placeholder="Contraseña" class="password" required>
            <input type="password" placeholder="Verificar Contraseña" class="verf-password" required>
            <input type="date" class="date" required>
            <input type="submit" value="Registrarse" class="registrarse">
        </form> -->
