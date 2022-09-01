<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/regis.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Prueba</title>
    <link rel="icon" href="../img/favicon.ico">
    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.sesion.php");
    require_once("../modelo/class.admin.php");
    error_reporting(0);

	  $userSession = new Sesion();
    if (isset($_SESSION['admin'])) {
      $user = new Admin();
      $user->setAdmin($userSession->getAdminActual());
    } else
      header("location: ../vistas/iniciosesion.php");
		
	?>
</head>
  
<body>
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
                        <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexAdmin.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-6 navbar-brand" href="creacionCuentas.php">CREACIÓN DE CUENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="visualizaCuentas.php">USUARIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="#">REPORTES</a>
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
    <div class="div-form">
        <form class="colorito" id="colorito" method="POST" action="../controlador/ctrRegistroAdmin.php">
            <label for="colorito" class="text-white fs-5">REGISTRO</label>
            <?php
          if(isset($error)){
            echo "<p class='text-white fs-5'>".$error."</p>";
          }
        ?>
            <div class="row">
                <div class="col">
                    <label for="form-control " class="text-white">Nombre</label>
                    <input type="text" class="form-control" placeholder="First name" name="nombre" required>
                </div>
                <div class="col">
                    <label for="form-control" class="text-white">Apellido</label>
                    <input type="text" class="form-control" placeholder="Last name" name="ape" required>
                </div>
            </div>
            <div class="sexo">
                <label for="form-check" class="text-white">Sexo</label>
                <div class="sexotexts">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio1" value="Hombre" name="sex"
                            required>
                        <label class="form-check-label text-white" for="inlineRadio1">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="inlineRadio2" value="Mujer" name="sex">
                        <label class="form-check-label text-white" for="inlineRadio2">Mujer</label>
                    </div>
                </div>
            </div>
            <div class="fecha">
                <label for="form-check" class="text-white">Fecha de nacimiento</label>
                <input type="date" class="datapicker" data-date-format="mm/dd/yyyy" name="fecha" required>
            </div>
            <div class="count">
                <div class="row">
                    <div class="col">
                        <label for="form-control " class="text-white">Correo</label>
                        <input type="email" class="form-control" placeholder="Email" name="mail" required>
                    </div>
                    <div class="col">
                        <label for="form-control" class="text-white">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Password" name="pass" required>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Siguiente">
        </form>
        <div class="divimagen">
        </div>
    </div>


    <footer class="text-center text-lg-start bg-primary text-white footer">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
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
            Nosotros somos Nova-medic y queremos darte las Gracias por confiar tu salud en nosotros. Disfruta Nova-Medic
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
           Web Site.
          </h6>
          <p>
            <a href="#!" class="text-reset">Instagram</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Facebook</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Twitter</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Youtube</a>
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
            <a href="#!" class="text-reset">Instagram</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Facebook</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Twitter</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Youtube</a>
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


    <script src="../js/iniciodesesion.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</body>

</html>