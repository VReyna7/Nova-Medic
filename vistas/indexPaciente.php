<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pacienteindex.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Inicio</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.doctor.php");
	  require_once("../modelo/class.sesion.php");

    error_reporting(0);
	    $userSession = new Sesion();
      
	    if(isset($_SESSION['cliente'])){
	  	$user = new Cliente();
	    $user->setCliente($userSession->getClienteActual());
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
                <a class="nav-link active fs-6 navbar-brand" aria-current="page" href="#" >INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="iniciarConsulta.php" >INICIAR CONSULTA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="chat.html">CHAT</a>
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
        <div class="info-text">
          <h3 class="display-5 objetivo-h3">Como Iniciar Consulta</h3>
          <p class="p-objetivos" class="text-center text-wrap" >Para iniciar tu consulta de una forma muy eficaz tendras que siguir los siguientes pasos para poder obter tu consulta eficazmente que la realizaremos con pocos pasos a seguir.
          </p>
          <br>
          <br>
          <p class="p-objetivos" class="text-center text-wrap">
            Paso 1: Tener una cuenta con todos tus datos correctos.</p>
          <p class="p-objetivos" class="text-center text-wrap">Paso 2: Ingresar al apartado llamado "Iniciar Consulta" que se muestra arriba en el menu desplegable.</p>
           <p class="p-objetivos" class="text-center text-wrap"> Paso 3: Leer Cada uno de las secciones que se encuentran y dar click al boton "INGRESAR" para observar la lista de medicos y seleccionar de todos ellos.</p> 
            <p class="p-objetivos" class="text-center text-wrap">Paso 4: Solicitar una cita con un medico de tu preferencia.</p>
      
          </div>
          <div id="carouselExampleSlidesOnly" class="carousel slide imagensita" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/iniciar con.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/iniciar con 2.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/iniciar cc.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
            </div>
          </div>
      </div>

    
      <div class="info2" id="info2">
        <div id="carouselExampleSlidesOnly" class="carousel slide " data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../img/chats-732x380.png" class="d-block w-200 imagen-info2" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../img/chat.jpg" class="d-block w-200 imagen-info2" alt="...">
            </div>
          </div>
        </div>
         <div class="info2-text">
           <h3 class="display-5 Mision-h3">Utiliza nuestro Chat</h3>
           <p class="p-mision" class="text-center ">Ponte en contacto con un doctor utilizando nuestro chat, para ponerte en contacto ahora mismo con un doctor y atienda tus problemas de salud de una forma
            rapida y segura, ya que nuestros doctores estan 100% capacidades para brindarte un exelente servicio y salaguardar tu salud. </p>
         </div>
       </div>

       <div class="info3" id="info">
        <div class="info-text">
          <h3 class="display-5 objetivo-h3">Tu Perfil</h3>
          <p class="p-objetivos" class="text-center text-wrap" >Gracias por ingresar a nuestro sitio. En tu perfil encontraras toda tu informacion de sebera importancia
            la cual podras cambiar a tu disposicion al igual que tu expediente medico con el cual tendras el control correcto a la hora de solicitar una cita con un doctor.</p>
          </div>
          <div id="carouselExampleSlidesOnly" class="carousel slide imagensita" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/final.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/perfil final.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../img/perfil xd.jpg" class="d-block w-200 imagensita" alt="...">
              </div>
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