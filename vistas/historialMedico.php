<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/informeConsultas.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Historial Médico</title>
    
    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.doctor.php");
	  require_once("../modelo/class.sesion.php");

    $idC = isset($_GET['idC'])?$_GET['idC']:"";

    //error_reporting(0);

	  $userSession = new Sesion();
	    if(isset($_SESSION['doctor'])){
		  $user = new Doctor();
	  	$user->setDoctor($userSession->getDoctorActual());
      $consulta = $user->AceptarConsul($userSession->getDoctorActual());

	    }else{
		  header("location: ../vistas/iniciosesion.php");
      } 
      
	?>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
          <img src="../img/Logo 2 real.png" width="90" height="90" class="d-inline-block align-top" alt="">
          <a class="navbar-brand fs-4" href="#">NOVA MEDIC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexDoctor.php" >INICIO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="../vistas/aceptarConsultas.php" >INICIAR CONSULTA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand active" href="../vistas/perfil.php">PERFIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand " href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
                </li>
              </ul>
        </div>
    </div>
  </nav>
  <div class="contenedor">
    <h1>Historial Medico</h1>
          <?php 
               $historial = $user->setHistorial($idC);
               foreach($historial as $mostrar){
                echo '<div class="histo"> 
                <div class="encabezado" id="encabezado">
                <h4>Razón de consulta: '.$mostrar["razon"].'</h4>
                <h4>Fecha: '.$mostrar["fecha"].'</h4>
             </div>';
                echo '  <div class="contenido" id="contenido">
                <h4>Médico: '.$mostrar["medico"].'</h4>
                <h4>Paciente: '.$mostrar["paciente"].'</h4>
                <section class="desCon">
                    <h4>Descripción de consulta:</h4>
                    <p>'.$mostrar["descrip"].'</p>
                </section>
                <section class="receta">
                    <h4>Receta:</h4>
                    <p>'.$mostrar["receta"].'</p>
                </section>
            </div>
        </div>';
                 }
          ?>   
    </div>
    

    <!-- Footer -->
  <footer class="text-center text-lg-start bg-primary text-white ">
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
  
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>