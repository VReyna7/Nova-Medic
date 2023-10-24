<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>

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
    <link rel="stylesheet" href="../css/aceptarConsulta.css?v=<?php echo time(); ?>">
	  <link rel="stylesheet" href="../css/estado.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>

    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.doctor.php");
	  require_once("../modelo/class.sesion.php");
    require_once("../modelo/class.consulta.php");

    error_reporting(0);

	  $userSession = new Sesion();
    $consul = new Consulta();


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
                <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="perfil.php">PERFIL</a>
              </li>
		<li class="nav-item">
                <button class="nav-link fs-6 navbar-brand" id="disponible" onclick="disponible()">Disponible</button>
                <button class="nav-link fs-6 navbar-brand" id="ocupado" onclick="ocupado()">Ocupado</button>
				<input type="hidden" id="selector" value="">
              </li>
              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
              </li>
            </ul>
          </div>
      </nav>
    <div class="contenedor">
      <h1>Pacientes en lista de espera</h1>
      <?php 
          foreach ($consulta as $mostrar){
           echo '<div class="doctores">
           <div class="fotoPerfil">
             <img src="'.$consul->getImagenPerfil($mostrar["cliente"]).'">
             <a href="../controlador/crtListaChat.php?nameC='.$consul->getNombreCompleto($mostrar["cliente"]).'&NameDC='. $user->getNombre().'&idC='.$mostrar["cliente"].'&idDC='.$user->getId().'&espe='.$user->getEspec().'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>
             <a href="perfil.php?idClient='.$mostrar["cliente"].'&accion=Visualizar&rol=Cliente"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Ver Perfil"></a>
           </div>
           <div class="informacion">
             <h4><strong>Nombre:</strong> '.$consul->getNombreCompleto($mostrar["cliente"]).'</h4>
             <h4><strong>Estado:</strong> En línea</h4>
             <h4><strong>Motivo de Consulta:</strong> '.$mostrar["descripcion"].'</h4>
             <h4><strong>Sexo:</strong> '.$consul->getSexo($mostrar["cliente"]).'</h4>
           </div>
         </div>';
          }
        ?>
    </div>
        
    </div>
</div>

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
    
<script src="../js/iniciarConsultas.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/estado.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
</body>
</html>
