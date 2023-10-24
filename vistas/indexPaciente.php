<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Inicio</title>

  <!-- FONTAWESOME FONTS & ICONS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- BOOTSTRAP 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- STYLESHEET -->
  <link rel="stylesheet" href="../css/pacienteindexx.css?v=<?php echo time(); ?>">
  <script src="../js/scrollreveal.js"></script>

  <?php
  require_once("../modelo/class.conexion.php");
  require_once("../modelo/class.cliente.php");
  require_once("../modelo/class.doctor.php");
  require_once("../modelo/class.sesion.php");

  error_reporting(0);
  $userSession = new Sesion();

  if (isset($_SESSION['cliente'])) {
    $user = new Cliente();
    $user->setCliente($userSession->getClienteActual());
  } else {
    header("location: ../vistas/iniciosesion.php");
  }

  ?>


</head>

<body>
<section>
        <!-- ++++++ MENU ++++++ -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
                <a class="navbar-brand fs-4" href="#">NOVA MEDIC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link fs-6 navbar-brand active" aria-current="page" href="#">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 navbar-brand" href="iniciarConsulta.php">INICIAR CONSULTA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 navbar-brand" href="perfil.php">PERFIL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ++++++ CIERRE DE MENU ++++++ -->

        <!-- BACKGROUND -->
        <section>
            <div class="content container-fluid text-center">
                <div class="ct-image" id="parallax"></div>
                <div class="ct-text">
                    <h1>Bienvenid@ Paciente</h1>
                </div>
            </div>
        </section>

        <!-- BIENVENIDA PERFIL -->
        <section class="container-fluid">
            <div class="content2 row text-center">
                <div class="perfilContent col container">
                    <h1>Perfil</h1>
                <p>Gracias por ingresar a nuestro sitio. <br>En tu perfil encontraras toda tu informacion de 
                    severa importancia la cual podras cambiar a tu disposicion al igual que tu expediente medico con el cual tendras el control correcto a la hora de solicitar una cita con un doctor.</p>
                </div>
                <div class="perfilImage col container">
                    <img class="perfilImg" src="../IMG/BG4.jpg" alt="">
                </div>
            </div>
        </section>

        <!-- SECTION COMO UTILIZAR CHAT -->
        <section>
            <div class="content3 container-fluid text-center">
                <div class="chat-image" id="parallax"></div>
                <div class="chat-text">
                    <h1>Utiliza nuestro Chat</h1>
                    <p>Ponte en contacto con un doctor utilizando nuestro chat, para ponerte en contacto ahora mismo con un doctor y atienda tus problemas de salud de una forma
                        rapida y segura, ya que nuestros doctores estan 100% capacidades para brindarte un exelente servicio y salaguardar tu salud.</p>
                </div>
            </div>
        </section>

        <!-- SECTION CONSULTA -->
        <section class="consulta">
            <div class="consult container-fluid text-center">
                <div class="row">
                    <h1>Como Iniciar Consulta</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>A</h2>
                        <p>Tener una cuenta con todos tus datos correctos. <br>✔📁🙍‍♂️</p>
                    </div>
                    <div class="col">
                        <h2>B</h2>
                        <p>Ingresar al apartado llamado "Iniciar Consulta" que se muestra arriba en el menu desplegable.<br>📩🩺🥼</p>
                    </div>
                    <div class="col">
                        <h2>C</h2>
                        <p>Leer Cada uno de las secciones que se encuentran y dar click al boton "INGRESAR" para observar la lista de medicos y seleccionar de todos ellos. <br>📖🥼🔎</p>
                    </div>
                    <div class="col">
                        <h2>D</h2>
                        <p>Solicitar una cita con un medico de tu preferencia. <br>👨‍⚕️👩‍⚕️📄</p>
                    </div>
                </div>
            </div>
        </section>

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
    </section>

    <script>
        // EFFECT PARALLAX
        const parallax = document.getElementById("parallax");
        const parallax2 = document.getElementById("parallax2");

            window.addEventListener("scroll", function () {
                let offset = window.pageYOffset;
                parallax.style.backgroundPositionY = offset * 0.7 + "px";
                parallax2.style.backgroundPositionY = offset * 0 + "px";
            });
    </script>
</body>
</body>

</html>