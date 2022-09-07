<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/cambioPass.css">
    <script src="../js/scrollreveal.js"></script>
    <!--<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>-->
   
</head>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.admin.php');
require_once('../modelo/class.sesion.php');


$id = isset($_GET['id'])?$_GET['id']:"";
$tipo = isset($_GET['tipo'])?$_GET['tipo']:"";

echo $id;
echo $tipo;

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
} else if (isset($_SESSION['admin'])) {
  $user = new Admin();
  $user->setAdmin($userSession->getAdminActual());
} else
  header("location: ../vistas/iniciosesion.php");
?>

<body>
<nav class="navbar  navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
          <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
          <a class="navbar-brand fs-4" href="#" >NOVA MEDIC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
              
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </div>
    </nav>

    <div class="div-form">
      <form class="colorito" id="colorito" method="POST" action="../controlador/crtCambiarContra.php">
        <label for="colorito" class="text-white fs-5">Cambiar contraseña</label>
        <?php
            if(isset($errorLog)){
                echo "<p class='text-white fs-5'>".$errorLog."</p>";
            }
        ?>
        <div class="form-group text-white">
          <label for="exampleInputEmail1">Nueva Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" name="contra" required>
          <small id="emailHelp" class="form-text text-white">Recuerda Nunca compartir ni tu contraseña a otras personas, ¡Cuida tu cuenta!</small>
        </div>
        <div class="form-group text-white">
          <label for="exampleInputPassword1">Confirme su contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password" name="pass" required>
        </div>
        <input type="submit" class="btn btn-primary mx-auto" value="Cambiar">
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
<script src="../js/iniciodesesion.js"></script>

</body>
</html>