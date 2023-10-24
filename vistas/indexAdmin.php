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
  <link rel="icon" href="../img/favicon.ico">
  <link rel="stylesheet" href="../css/pacienteindexx.css?v=<?php echo time(); ?>">
  <script src="../js/scrollreveal.js"></script>

  <?php
  require_once("../modelo/class.conexion.php");
  require_once("../modelo/class.sesion.php");
  require_once("../modelo/class.admin.php");
  error_reporting(0);

  $userSession = new Sesion();
  if (isset($_SESSION['admin'])) {
    $user = new Admin();
    $user->setAdmin($userSession->getAdminActual());
  } else {
    header("location: ../vistas/iniciosesion.php");
  }
  ?>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
      <a class="navbar-brand fs-4" href="#">NOVA MEDIC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active fs-6 navbar-brand" aria-current="page" href="#">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 navbar-brand" href="creacionCuentas.php">CREACIÓN DE CUENTAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 navbar-brand" href="visualizaCuentas.php">USUARIOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-6 navbar-brand" href="reporte.php">REPORTES</a>
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

  <!-- BACKGROUND -->
  <section>
    <div class="content container-fluid text-center">
      <div class="ct-image" id="parallax"></div>
      <div class="ct-text">
        <h1>Bienvenid@ Admin</h1>
      </div>
    </div>
  </section>

  <!-- Tu función como administrador -->
  <section class="container-fluid">
    <div class="content2a row text-center">
      <div class="perfilContenta col container">
        <h1>Tu función como administrador</h1>
        <p>Tu función como administrador, es la función mas importante dentro de los roles de la página, 
          ya que tus cuentas con las herramientas necesarias para crear nuevos usuarios dentro de la página, de igual forma tienes la capacidad de 
          banear usuarios, sin antes a ver evaluado la magnitud del reporte del remitente.</p>
      </div>
      <div class="perfilImagea col container">
        <img class="perfilImga" src="../IMG/admin.png" alt="">
      </div>
    </div>
  </section>

  <!-- Crea cuentas para nuestro doctores -->
  <section class="container-fluid">
    <div class="content3_d row text-center" id="parallax">
    <div class="perfilImaged col container">
        <img class="perfilImgd" src="../IMG/fondo5.png" alt="">
      </div>
      <div class="perfilContentd col container">
        <h1>Crea cuentas para nuestro doctores</h1>
        <p>En este apartado, se ingresan los datos de los nuevos usuarios que formaran parte de nuestro sistema de Doctores, 
          tu tarea es ingresar de forma correcta los datos de los usuarios seleccionados para ser Doctores que ayudan con la atención de los usuarios 
          pacientes dentro de la página</p>
      </div>
    </div>
  </section>

  <!-- Crea otros administradores -->
  <section class="container-fluid">
    <div class="content4_d row text-center">
      <div class="perfilContentd col container">
        <h1>Crea otros administradores</h1>
        <p>En este aparatado, se ingresan los datos para registrar nuevos usuarios que cumplirán con el rol de administradores, 
          es importante que seas muy minucioso con los datos que ingresas y que solo ingreses datos autorizados por tu superior o datos autorizados por entes autorizados, 
          ya que de esta forma no provocaras desastres o descontrol dentro de la página.</p>
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
  <!-- Footer -->
  <script src="../js/pacienteindex.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


  <script>
    // EFFECT PARALLAX
    const parallax = document.getElementById("parallax");
    const parallax2 = document.getElementById("parallax2");

    window.addEventListener("scroll", function() {
      let offset = window.pageYOffset;
      parallax.style.backgroundPositionY = offset * 0.7 + "px";
      parallax2.style.backgroundPositionY = offset * 0 + "px";
    });
  </script>
</body>
</body>

</html>