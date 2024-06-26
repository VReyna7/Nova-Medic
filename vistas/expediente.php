<?php  
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/expediente.css">
    <script src="../js/scrollreveal.js"></script>
    <script src="../js/editarPerfil.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Expediente</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php
  require_once("../modelo/class.conexion.php");
  require_once("../modelo/class.cliente.php");
  require_once("../modelo/class.doctor.php");
  require_once("../modelo/class.sesion.php");
  require_once("../modelo/class.expedienteMedico.php");

  error_reporting(0);
  $userSession = new Sesion();

  if (isset($_SESSION['doctor'])) {
    $user = new Doctor();
    $user->setDoctor($userSession->getDoctorActual());
    $doctor = true;
  } elseif (isset($_SESSION['cliente'])) {
    $user = new Cliente();
    $expe = new Expediente();
    $expe->setExp($userSession->getClienteActual());
  } else if (isset($_SESSION['admin'])) {
    $user = new Admin();
    $user->setAdmin($userSession->getAdminActual());
  } else
    header("location: ../vistas/iniciosesion.php");
  ?>

</head>
<body>
    <!--Barra de navegación-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <img src="../img/Logo 2 real.png" width="90" height="90" class="d-inline-block align-top" alt="">
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
                <a class="nav-link fs-6 navbar-brand" href="../vistas/iniciarConsulta.php" >INICIAR CONSULTA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand active" href="../vistas/perfil.php">PERFIL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!--Perfil-->
    <div class="contenedor">
      <div class="contenido">
        <div class="fotoPerfil">
            <img src="../img/Logo real.png">
          </div>
        <div class="datosUsuario">
       
          <form>
            <?php 
            ?>
              <label>¿Ha tenido reacciones alergicas a medicamentos?</label><input type="text" id="alergia" disabled placeholder="<?php if($expe->getMedicina() == "Si"){
                echo $expe->getText_medicina(); 
              }else{
                echo "No. Según registro de expediente medico";
              }
               ?>">

              <label>Tipo de sangre</label><input type="text" id="sangre" disabled placeholder="<?php echo $expe->getSangre()?>">
              <label>¿Es alergico a algún animal o comida?</label><input id="comida" disabled placeholder="<?php if($expe->getAlergia() == "Si"){
                echo $expe->getText_anima(); 
              }else{
                echo "No. Según registro de expediente medico";
              }
               ?>">
              <label>¿Ha sido tratado psicologicamente alguna vez?</label><input id="psicologia" disabled placeholder="<?php if($expe->getPsico() == "Si"){
                echo "Si. Según registro de expediente medico"; 
              }else{
                echo "No. Según registro de expediente medico";
              }
               ?>">

              <label>¿Cual es su altura?</label><input id="altura" disabled placeholder="<?php echo $expe->getAltura()?>">
              <label>¿Cual es su Peso?</label><input id="sexo" disabled placeholder="<?php echo $expe->getPeso()?>">
          </form>
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
<script src="../js/perfil.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
</body>
</body>
</html>