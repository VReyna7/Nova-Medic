<?php session_start(); ?>
  <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/psicologia.css?v=<?php echo time(); ?>">
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <title>Reportes</title>
      <?php
	     require_once("../modelo/class.conexion.php");
	     require_once("../modelo/class.cliente.php");
	     require_once("../modelo/class.doctor.php");
	     require_once("../modelo/class.sesion.php");

      $nombreReportado = isset($_GET['nombre'])?$_GET['nombre']:"";
      $apellidoReportado = isset($_GET['apellido'])?$_GET['apellido']:"";
      $rolReportado = isset($_GET['rol'])?$_GET['rol']:"";
      $category = isset($_GET['category'])?$_GET['category']:"";
      $idReportante = isset($_GET['idReportante'])?$_GET['idReportante']:"";
      $idReportado = isset($_GET['idReportado'])?$_GET['idReportado']:"";
      $nombreCompletoReportado = $nombreReportado .' '. $apellidoReportado;

      error_reporting(0);
	    $userSession = new Sesion();
	    if(isset($_SESSION['cliente'])){
	  	$user = new Cliente();
	    $user->setCliente($userSession->getClienteActual());
	    }else if(isset($_SESSION['doctor'])){
        $user = new Doctor();
        $user->setDoctor($userSession->getDoctorActual());
        $doctor = true;
        $cliente = false; 
      }else{
      header("location: ../vistas/iniciosesion.php");
     }
	
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
                  <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexPaciente.php" >INICIO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="iniciarConsulta.php" >INICIAR CONSULTA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand active" href="perfil.php">PERFIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
                </li>
              </ul>
            </div>
      </nav>
      
      <div class="contPopUp" id="contPopUp">
        <form action="../controlador/crtReportes.php" class="popUp" id="popup" method="POST">
          <div class="titClose">
              <H4>Ingrese el motivo del reporte</H4>
              <?php 
              echo ' <a href="doctoresConsul.php?category='.$category.'"><input type="button" id="close" value="x"></a>'
              ?>
          </div>
          <label>Descripción:</label><textarea id="descripcion" name="descripcion" class="Dess" required rows="4" cols="50"></textarea>
          <input type="hidden" name="rol" value="<?php echo $rolReportado; ?>">   
          <input type="hidden" name="nombreReportado" value="<?php echo $nombreCompletoReportado; ?>">   
          <input type="hidden" name="Reportante" value="<?php echo $user->getNombreCompleto(); ?>">
          <input type="hidden" name="category" value="<?php echo $category; ?>">
          <input type="hidden" name="idReportado" value="<?php echo $idReportado; ?>">
          <input type="hidden" name="idReportante" value="<?php echo  $idReportante; ?>">
          <input type="submit" value="Enviar" name="enviar" class="btnPopUp">
        </form>
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
    </body>
    </html>