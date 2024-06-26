<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/regHistorialMedico.css">
    <link rel="stylesheet" href="../css/estado.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="icon" href="../img/favicon.ico">
	<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.doctor.php");
	require_once("../modelo/class.cliente.php");
	require_once("../modelo/class.sesion.php");

	$doc = new Doctor;
	$clnt = new Cliente;
	$sesion = new Sesion;

	if(isset($_SESSION['doctor'])){
		$idDoc = isset($_GET['idDoc'])?$_GET['idDoc']:"";
		$idC = isset($_GET['idC'])?$_GET['idC']:"";
		$doc->setDoctor($idDoc);
		$clnt->setCliente($idC);
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
                  <a class="nav-link fs-6 navbar-brand " href="../vistas/perfil.php">PERFIL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand " href="<?php echo 'chat.php?idC='.$idC.'&idDoc='.$idDoc; ?>">REGRESAR</a>
                </li>
                <li class="nav-item">
                <button class="nav-link fs-6 navbar-brand" id="disponible" onclick="disponible()">Disponible</button>
                <button class="nav-link fs-6 navbar-brand" id="ocupado" onclick="ocupado()">Ocupado</button>
              </li>
                <li class="nav-item">
                  <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
                </li>
              </ul>
        </div>
    </div>
  </nav>
  <div class="div-form">
    <form class="colorito" id="colorito" method="POST" action="../controlador/crtCrearHistorial.php">
      <label for="colorito" class="text-white fs-5">HISTORIAL MEDICO</label>
		<?php
		if(isset($error)){
			echo "<p>".$error."</p>";
		}
		?>
      <div class="form-group text-white">
        <label for="exampleInputEmail1">Médico</label>
		<input type="text" class="form-control" id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp"  name="doctor" value=<?php echo $doc->getNombreCompleto()?> required>
      </div>
      <div class="form-group text-white">
        <label for="exampleInputPassword1">Paciente</label>
		<input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" name="paciente" value=<?php echo $clnt->getNombreCompleto()?> required>
      </div>
      <div class="form-group text-white">
        <label for="exampleInputPassword1">Razon de Consulta:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  name="razon" required>
      </div>
      <div class="form-group text-white">
        <label for="exampleInputPassword1">Descripción de Consulta</label>
        <textarea type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  name="descrip" required></textarea>
      </div>
      <div class="form-group text-white">
        <label for="exampleInputPassword1">Receta Médica</label>
        <textarea type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  name="receta" required></textarea>
      </div>
	  <input type="hidden" value=<?php echo $idC?> name="idC">
		<input type="hidden" value=<?php echo $idDoc?> name="idDoc">
      	<input type="submit" class="btn btn-primary mx-auto" value="Añadir">
    </form>
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
    <script src="../js/estado.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>
