<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>

    <!-- FONTAWESOME FONTS & ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- STYLESHEET -->
    <link rel="icon" href="../IMG/favicon.ico">
    <link rel="stylesheet" href="../css/indexsesion.css">
    <script src="../js/scrollreveal.js"></script>
    <?php
    if (isset($_SESSION['cliente'])) {
        header("location: ../vistas/indexPaciente.php");
    } else if (isset($_SESSION['doctor'])) {
        header("location: ../vistas/indexDoctor.php");
    } else if (isset($_SESSION['admin'])) {
        header("location: ../vistas/indexAdmin.php");
    }
    ?>
</head>
<body>
    <!-- MENU -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <img src="../img/favicon.ico" width="90" height="90" class="d-inline-block align-top" alt="">
            <a class="navbar-brand fs-4" href="../index.html">NOVA MEDIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" aria-current="page" href="../index.html">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="../vistas/desarrolladores.html">DESARROLLADORES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand active" href="#">INICIAR SESION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="registro.php">REGISTRARSE</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- CIERRE MENU -->


    <!-- INICIO DE SESIÓN -->
    <div class="div-form">
        <form class="colorito" id="colorito" method="POST" action="../controlador/crtInicioSesion.php">
            <label for="colorito" class="text-white fs-5">INICIO DE SESION</label>
            <?php
            if (isset($errorLog)) {
                echo "<p class='text-white fs-5'>" . $errorLog . "</p>";
            }
            ?>
            <div class="form-group text-white">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail" required>
                <small id="emailHelp" class="form-text text-white">Recuerda Nunca compartir ni tu correo , ni tu contraseña con alguien.</small>
            </div>
            <div class="form-group text-white">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required>
            </div>
            <div class="form-group text-white">
                <p class="registerText">¿Eres nuevo? <a href="../vistas/registro.php" class="registerLink">&nbsp;Registrate aquí!</a></p>
            </div>
            <input type="submit" class="btn btn-dark" value="Iniciar sesión">
        </form>
        <div class="divimagen">
        </div>
    </div>
    <!-- CIERRE INICIO DE SESIÓN -->


    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-dark text-white footer">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom text-center">
        </section>
        <!-- Section: Social media -->
    
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Nova-Medic.
                        </h6>
                        <p>
                            Nosotros somos Nova-medic y queremos darte las Gracias por confiar tu salud en nosotros.
                            Disfruta Nova-Medic
                        </p>
                    </div>
                    <!-- Grid column -->
    
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Sitios web.
                        </h6>
                        <p>
                            <a href="#!" class="text-reset"><i class="fab fa-instagram">&nbsp;&nbsp;</i>Instagram</i></a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset"><i class="fab fa-facebook-f"></i>&nbsp;&nbsp;Facebook</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset"><i class="fab fa-twitter"></i>&nbsp;&nbsp;Twitter</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset"><i class="bi bi-youtube"></i>&nbsp;&nbsp;Youtube</a>
                        </p>
                    </div>
                    <!-- Grid column -->
    
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> El Salvador, San Salvador.</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            novamedic@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +503 7208-0960</p>
                        <p><i class="fas fa-print me-3"></i> +503 7208-0960</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>
    <!-- Footer -->

    <script src="../js/indexSession.js"></script>
</body>
</body>

</html>