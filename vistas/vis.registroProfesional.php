<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/vis.registroProfesional.css?v=<?php echo time();?>"/>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <title>Rent a Professional - RAP</title>
</head>
<body>
    <div class="containerRegisPro">
        <header>
            <!--<img src="" alt="Rent a Profesional">-->
            <h2>Rent a Profesional</h2>
        </header>
        <form method="POST" action="../controlador/insertarProfecional.php" class="formPro">
            <input type="text" name="nombre" id="name" autocomplete="off" placeholder="Nombre" class="nombres" required></br>
            <input type="text" name="apellido" id="lastName" autocomplete="off" placeholder="Apellido" class="apellidos" required></br>
            <input type="email" name="correo" id="email" autocomplete="off" placeholder="Correo Electrónico" class="e-mail" required></br>
            <input type="password" name="pass" id="pass" autocomplete="off" placeholder="Contraseña" class="password"></br>
            <input type="password" name="pass2" id="pass2" autocomplete="off" placeholder="Verificar Contraseña" class="verf-password" required></br>
            <input type="date" name="fecha_nac" id="fechaNac" autocomplete="off" class="date" required></br>
            <label class="profesionLabel">Profesión:</label>
            <select name="profesion" class="profesion">
                <option class="option">Desarrollador de Software</option>
                <option class="option">Doctor</option>
                <option class="option">Diseñador</option>
                <option class="option">Profesor</option>
            </select></br></br>
			<p class="linked"><?php if(isset($errorLlenado)) echo $errorLlenado?></p>
            <input type="submit" name="enviar" value="Registrarse" class="registrarse"></br>
        </form>
        <a href="vis.inicioSesion.php" class="linked">¿Tienes una cuenta? Inicia Sesión</a>
    </div>
</body>
</html>
