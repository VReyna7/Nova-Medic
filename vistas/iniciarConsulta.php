<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/iniciarconsulta.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar Consulta</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.sesion.php");

    error_reporting(0);

	  $userSession = new Sesion();

	    
	    if(isset($_SESSION['cliente'])){
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
                <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexPaciente.php" >INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand active" href="iniciarConsulta.php" >INICIAR CONSULTA</a>
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
      <!--<div class="divfondo" id="fondo">
        <div class="bntsPrinc">
          <a href="vistas/sesiones/iniciosesion.html"><button>Iniciar Sesion</button></a>
          <a href="vistas/sesiones/registro.html"><button>Registro</button></a>
      </div>
      </div>
     -->
      <div class="info" id="info">
        <div class="fondoprimario">
        </div>
        <div class="info-text">
          <h3 class="display-5 objetivo-h3">CONSULTA GENERAL</h3>
          <p class="p-objetivos" class="text-center text-wrap" >En este aparatado, se encuentran el listado de Doctores disponibles para atender consultas generales, estos se enfocan en explorar a nivel subjetivo y objetivo una necesidad(malestares, dolor, sufrimiento o daño) del paciente, haciendo uso de sus conocimientos, intuición y conciencia para establecer un diagnostico o dar una indicación al paciente.</p>
             <div class="bntsPrinc">
             <?php 
                echo "<a href='doctoresConsul.php?category=General'><button>Ingresar</button></a>"
                ?>
              </div>
          </div>
      </div>

      <div class="info-mid" id="info-mid">
        <div class="info-text">
          <h3 class="display-5 objetivo-h3">PSICOLOGÍA</h3>
          <p class="p-objetivos" class="text-center text-wrap" >En este aparatado, se encuentran el listado de terapeutas disponibles para atender problemas psicológicos, estos se encargan de evaluar y conocer los problemas por los que la persona busca ayuda, comprendiendo su origen y el malestar que producen tanto en el ámbito emocional o psicológico, físico como, con las personas de su entorno. Después de una evaluación adecuada, en función de la identificación de las áreas problema o diagnóstico, se establecen junto el paciente, los objetivos terapéuticos y la estrategia o tratamientos psicológico adecuados y necesarios para solucionar los problemas de forma individualizada en cada persona, junto con un seguimiento para comprobar si la mejora se mantiene a lo largo de todo el proceso psicoterapéutico.</p>
            <div class="bntsPrinc">
            <?php 
                echo "<a href='doctoresConsul.php?category=Psico'><button>Ingresar</button></a>"
                ?>
            </div>
          </div>
          <div class="fondoprimario-mid">
        </div>
      </div>

      <div class="info" id="info">
        <div class="fondoprimario">
        </div>
        <div class="info-text">
          <h3 class="display-5 objetivo-h3">NUTRICIONISTAS</h3>
          <p class="p-objetivos" class="text-center text-wrap" >En este aparatado, se encuentran el listado de especialistas disponibles para atender problemas nutricionales, estos se encargan de evaluar y conocer a partir de sus conocimientos, experiencias, conciencia e intuición, cual es el estado a nivel de organismo de cada individuo, para aplicar los cambios necesarios para una respectiva dieta, equilibrada que ayude al organismo del paciente.</p>

             <div class="bntsPrinc">
             <?php 
                echo "<a href='doctoresConsul.php?category=Nutri'><button>Ingresar</button></a>"
                ?>
              </div>
 
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
<script src="../js/pacienteindex.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
</body>
</body>
</html>