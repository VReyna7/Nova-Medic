<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/aceptarConsulta.css">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Prueba</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.doctor.php");
	  require_once("../modelo/class.sesion.php");

    error_reporting(0);

	  $userSession = new Sesion();

	    if(isset($_SESSION['doctor'])){
		  $user = new Doctor();
	  	$user->setDoctor($userSession->getDoctorActual());
	    }elseif(isset($_SESSION['cliente'])){
	  	$user = new Cliente();
	    $user->setCliente($userSession->getClienteActual());
	  }else
		header("location: ../vistas/iniciosesion.php");
	?>

</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
          <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
          <a class="navbar-brand fs-4" href="#" >NOVA MEDIC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexDoctor.php" >INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand active" href="aceptarConsultas.php" >ACEPTAR CONSULTAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="#">CHAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="perfil.php">PERFIL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
              </li>
            </ul>
          </div>
      </nav>
    <div class="contenedor">
      <h1>Pacientes en lista de espera</h1>
      <div class="doctores">
        <div class="fotoPerfil">
          <img src="../img/fotoperfil.webp">
          <button class="iniciarConsulta">Iniciar Consulta</button>
        </div>
        <div class="informacion">
          <h4><strong>Nombre:</strong> Juanito Alcachofa</h4>
          <h4><strong>Estado:</strong> En línea</h4>
          <h4><strong>Motivo de Consulta:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum amet laboriosam fugiat aperiam 
            deserunt hic mollitia iure eaque voluptatum, quod explicabo modi</h4>
        </div>
      </div>
      <div class="doctores">
        <div class="fotoPerfil">
          <img src="../img/fotoperfil.webp">
          <button class="iniciarConsulta">Iniciar Consulta</button>
        </div>
        <div class="informacion">
            <h4><strong>Nombre:</strong> Juanito Alcachofa</h4>
            <h4><strong>Estado:</strong> En línea</h4>
            <h4><strong>Motivo de Consulta:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum amet laboriosam fugiat aperiam 
              deserunt hic mollitia iure eaque voluptatum, quod explicabo modi</h4>
          </div>
      </div>
      <div class="doctores">
        <div class="fotoPerfil">
          <img src="../img/fotoperfil.webp">
          <button class="iniciarConsulta">Iniciar Consulta</button>
        </div>
        <div class="informacion">
            <h4><strong>Nombre:</strong> Juanito Alcachofa</h4>
            <h4><strong>Estado:</strong> En línea</h4>
            <h4><strong>Motivo de Consulta:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum amet laboriosam fugiat aperiam 
              deserunt hic mollitia iure eaque voluptatum, quod explicabo modi</h4>
          </div>
      </div>
    </div>
        
    </div>
</div>

      <!-- Footer -->
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
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(8, 7, 7, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="../js/iniciarConsultas.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
</body>
</html>