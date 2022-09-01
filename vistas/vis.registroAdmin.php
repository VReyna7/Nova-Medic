<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.registroAdmin.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/65b3ef90af.js" crossorigin="anonymous"></script>
    <title>Rent a Professional - RAP</title>

</head>
<body>
    <div class="containerRegis">
        <header>
        <div class="flechita"><a href="vis.listadoAdministrador.php"><i class="fas fa-chevron-left"></a></i></div>
            <h2>Registrar Administrador</h2>
        </header>
        <form class="form" method='post' action="../controlador/insertarAdm.php">
            <input type="text" placeholder="Nombre" class="nombres" name="nombre" required>
            <input type="text" placeholder="Apellido" class="apellidos" name="apellido" required>
            <input type="email" placeholder="Correo Electrónico" class="e-mail" name="correo" required>
            <input type="password" placeholder="Contraseña" class="password" name="pass" required>
            <input type="password" placeholder="Verificar Contraseña" class="verf-password" name="passV" required>
            <input type="date" class="date" name="fechaNac" required>
            <input type="submit" value="Registrar" class="registrarse">
        </form>
    </div>
</body>
</html>
