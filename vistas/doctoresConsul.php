<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/psicologia.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <script src="../js/doctoresConsul.js"></script>
    <script src="../js/popUp.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Prueba</title>
    <link rel="icon" href="../img/favicon.ico">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.cliente.php");
	  require_once("../modelo/class.doctor.php");
    require_once("../modelo/class.chat.php");
	  require_once("../modelo/class.sesion.php");
    require_once("../modelo/class.consulta.php");
    $consul = new Consulta();
    $chat = new Chat();
    $category = isset($_GET['category'])?$_GET['category']:"";
    error_reporting(0);
	    $userSession = new Sesion();
      $docs = New Doctor();
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
    </nav>

  <div id="contKing">
    <div class="contenedor" id="contenedor">
      <h1>Médicos Disponibles</h1>
      <?php 
        if($category == "General"){
          $cuentas =  $docs->docGenerales();
          foreach ($cuentas as $mostrar){
			if($mostrar['estado']==1){
				$estado = "Libre";
			}else if($mostrar['estado']==2){
				$estado = 'Ocupado';
			};
            echo '<div class="doctores">
            <div class="fotoPerfil">
              <img src="'.$mostrar["fotoPerfil"] .'">';
              
              if($chat->searchChat($userSession->getClienteActual(),$mostrar["id"])){
               echo '<a href="chat.php?idC='.$userSession->getClienteActual().'&idDoc='.$mostrar["id"].'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta aceptada"></a>';
               }else if($consul->searchConsulta($userSession->getClienteActual(), $mostrar["id"])){
                echo ' <a href="doctoresConsul.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta en proceso"></a>';
               }else{
                if($consul->searchConsultTypes($user->getId(),$category)){
                  echo' <a href="doctoresConsul.php?category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
                  
                }else{
                  echo ' <a href="consultacreacion.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
              }
               }
               echo'
               <a href="perfil.php?idDoc='.$mostrar["id"].'&accion=Visualizar&rol=Doctor&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Ver Perfil"></a>
              </div>
            <div class="informacion">
              <h4><strong>Nombre:</strong> '.  $mostrar["nombre"] . " " .$mostrar["apellido"] .'</h4>
              <h4><strong>Especialidad:</strong> '. $mostrar["espec"] .'</h4>
              <h4><strong>Estado:</strong> '.$estado.'</h4>
              <h4><strong>Titulos:</strong>'.$mostrar['titulos'].'</h4>
            </div></div>';
          }
        }else if($category == "Psico"){
          $cuentas =  $docs->docPsicos();
          foreach ($cuentas as $mostrar){
			if($mostrar['estado']==1){
				$estado = "Libre";
			}else if($mostrar['estado']==2){
				$estado = 'Ocupado';
			};
            echo '<div class="doctores">
            <div class="fotoPerfil">
              <img src="'.$mostrar["fotoPerfil"] .'">';
              if($chat->searchChat($userSession->getClienteActual(),$mostrar["id"])){
               echo '<a href="chat.php?idC='.$userSession->getClienteActual().'&idDoc='.$mostrar["id"].'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta aceptada"></a>';
               }else if($consul->searchConsulta($userSession->getClienteActual(), $mostrar["id"])){
                echo ' <a href="consultacreacion.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta en proceso"></a>';
               }else{
                if($consul->searchConsultTypes($user->getId(),$category)){
                  echo' <a href="doctoresConsul.php?category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
                  
               }else{
                echo ' <a href="consultacreacion.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
               }
              }
              echo'
              <a href="perfil.php?idDoc='.$mostrar["id"].'&accion=Visualizar&rol=Doctor&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Ver Perfil"></a>
              </div>
            <div class="informacion">
              <h4><strong>Nombre:</strong> '.  $mostrar["nombre"] . " " .$mostrar["apellido"] .'</h4>
              <h4><strong>Especialidad:</strong> '. $mostrar["espec"] .'</h4>
              <h4><strong>Estado:</strong>'.$estado.'</h4>
              <h4><strong>Titulos:</strong>'.$mostrar['titulos'].'</h4>
            </div></div>';
            }
        }else if($category == "Nutri"){
          $cuentas =  $docs->docNutri();
          foreach ($cuentas as $mostrar){
			if($mostrar['estado']==1){
				$estado = "Libre";
			}else if($mostrar['estado']==2){
				$estado = 'Ocupado';
			};
            echo '<div class="doctores">
            <div class="fotoPerfil">
              <img src="'.$mostrar["fotoPerfil"] .'">';
              if($chat->searchChat($userSession->getClienteActual(),$mostrar["id"])){
                echo '<a href="chat.php?idC='.$userSession->getClienteActual().'&idDoc='.$mostrar["id"].'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta aceptada"></a>';
               }else if($consul->searchConsulta($userSession->getClienteActual(), $mostrar["id"])){
                echo ' <a href="consultacreacion.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Consulta en proceso"></a>';
               }else{
                if($consul->searchConsultTypes($user->getId(),$category)){
                  echo' <a href="doctoresConsul.php?category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
                  
                }else{
                  echo ' <a href="consultacreacion.php?idDoc='.$mostrar["id"].'&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Iniciar Consulta"></a>';
                }
               }
             echo '
             <a href="perfil.php?idDoc='.$mostrar["id"].'&accion=Visualizar&rol=Doctor&category='.$category.'"><input type="button"  class="iniciarConsulta" id="iniciarConsulta" value="Ver Perfil"></a>
            </div>
            <div class="informacion">
              <h4><strong>Nombre:</strong> '.  $mostrar["nombre"] . " " .$mostrar["apellido"] .'</h4>
              <h4><strong>Especialidad:</strong> '. $mostrar["espec"] .'</h4>
			  <h4><strong>Estado:</strong>'.$estado.'</h4>
              <h4><strong>Titulos:</strong>'.$mostrar['titulos'].'</h4>
            </div></div>';
            }
        }
      ?>
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
</body>
</html>
