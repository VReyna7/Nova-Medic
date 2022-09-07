<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/perfil.css?v=<?php echo time(); ?>">
  <script src="../js/scrollreveal.js"></script>
  <script src="../js/editarPerfil.js"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>Perfil</title>
  <link rel="icon" href="../img/favicon.ico">
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php
error_reporting(0);
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.admin.php");
require_once("../modelo/class.sesion.php");

$idDoct = isset($_GET['idDoc']) ? $_GET['idDoc'] : "";
$accion = isset($_GET['accion']) ? $_GET['accion'] : "";
$idClient = isset($_GET['idClient']) ? $_GET['idClient'] : "";
$rol = isset($_GET['rol']) ? $_GET['rol'] : "";
$category = isset($_GET['category']) ? $_GET['category'] : "";


$userSession = new Sesion();
if (isset($_SESSION['doctor'])) {
  $user = new Doctor();
  $user->setDoctor($userSession->getDoctorActual());
  $doctor = true;
  $cliente = false;
}
elseif (isset($_SESSION['cliente'])) {
  $user = new Cliente();
  $cliente = true;
  $doctor = false;
  $user->setCliente($userSession->getClienteActual());
}
else if (isset($_SESSION['admin'])) {
  $user = new Admin();
  $user->setAdmin($userSession->getAdminActual());
  $admin = true;
}
else
  header("location: ../vistas/iniciosesion.php");
?>

</head>

<body>
  <!--Barra de navegación-->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src="../img/Logo 2 real.png" width="90" height="90" class="d-inline-block align-top" alt="">
      <a class="navbar-brand fs-4" href="#">NOVA MEDIC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <?php
if ($doctor) {
  echo '<ul class="navbar-nav mx-auto">
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
                <button class="nav-link fs-6 navbar-brand" id="disponible" onclick="disponible()">Disponible</button>
                <button class="nav-link fs-6 navbar-brand" id="ocupado" onclick="ocupado()">Ocupado</button>
				<input type="hidden" id="selector" value="">
				
              </li>

              <li class="nav-item">
                <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
              </li>
            </ul>';
}
else if ($cliente) {
  echo '  <ul class="navbar-nav mx-auto">
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
            </ul>';
}
else if ($admin) {
  echo '  <ul class="navbar-nav mx-auto">
          <li class="nav-item">
              <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexAdmin.php">INICIO</a>
          </li>
          <li class="nav-item">
              <a class="nav-link fs-6 navbar-brand" href="creacionCuentas.php">CREACIÓN DE CUENTAS</a>
          </li>
          <li class="nav-item">
              <a class="nav-link  fs-6 navbar-brand" href="visualizaCuentas.php">USUARIOS</a>
          </li>
          <li class="nav-item">
              <a class="nav-link fs-6 navbar-brand" href="reporte.php">REPORTES</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active fs-6 navbar-brand" href="#">PERFIL</a>
          </li>
          <li class="nav-item">
              <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
          </li>
      </ul>';
}
?>

      </div>
    </div>
  </nav>
  <!--Perfil-->
  <div class="contenedor">
    <div class="encabezado">
      <h3>Información Personal</h3>
      <div>
        <?php
if ($accion != "Visualizar" && isset($_SESSION['cliente'])) {
  echo '<input type="button" name="editar" value="Cambiar Contraseña" onclick="cambiarContrasenia()">';
  echo '<input type="button" name="editar" value="Editar" onclick="activateInputsCliente()">';
}else if($accion != "Visualizar" && isset($_SESSION['doctor'])){
	echo '<input type="button" name="editar" value="Cambiar Contraseña" onclick="cambiarContrasenia()">';
  echo '<input type="button" name="editar" value="Editar" onclick="activateInputsDoc()">';
}else if($accion != "Visualizar" && isset($_SESSION['admin'])){
	echo '<input type="button" name="editar" value="Cambiar Contraseña" onclick="cambiarContrasenia()">';
  echo '<input type="button" name="editar" value="Editar" onclick="activateInputsDoc()">';
}


?>
      </div>
    </div>
    <div class="contenido">
      <?php
if ($accion == "Visualizar") {
  if ($rol == "Doctor") {
    $doc = new Doctor();
    $doc->setDoctor($idDoct);
    echo '<div class="fotoPerfil">
              <img src="' . $doc->getFoto() . '">';
    if ($cliente) {
      echo '<a href=" ../vistas/reportesCreacion.php?nombre=' . $doc->getNombre() . '&apellido=', $doc->getApellido() . '&rol=Doctor&category=' . $category .'&idReportante='.$userSession->getClienteActual().'&idReportado='.$doc->getId() .'"><input type="button" class="btn buttonReport btn-danger" value="Reportar"></a>';
    }
    echo '</div>';
    echo '<div class="datosUsuario">
          <form>
            <label>Nombre:</label><input type="text" id="nombre" disabled value="' . $doc->getNombre() . '">
            <label>Apellido:</label><input type="text" id="apellido" disabled value="' . $doc->getApellido() . '">
            <label>Correo Electrónico:</label><input type="email" id="email" disabled placeholder="' . $doc->getCorreo() . '">
            <label>Sexo:</label><input type="text" id="sexo" disabled placeholder="' . $doc->getSexo() . '">
            <label>Titulos Profesionales:</label><input type="text" id="titulos" disabled value="'.$doc->getTitulos().'" placeholder="Titulos..."></textarea>
            <label id="confPasswordLabel" style="display:none;">Contraseña:</label><input type="password" id="contrasenia" placeholder="Ingresar Contraseña..." required style="display: none;">
            <input type="submit" value="Confirmar Cambios" id="confCambios" class="confCambios" onclick="activateButton()">
          </form>
          <form id="cambiarContra" style="display:none;">
            <label id="newPasss">Nueva Contraseña:</label><input type="password" id="newPassInput">
            <label id="confPasswordLabel">Confirmar Contraseña:</label><input type="password" id="confPassword">
            <input type="button" name="guardarCambios" value="Guardar Cambios" class="guardarCambios">;
          </form>
           </div>';
  }
  else if ($rol == "Cliente") {
    $client = new Cliente();
    $client->setCliente($idClient);
    echo '<div class="fotoPerfil">
              <img src="' . $client->getFoto() . '">';
    if ($doctor) {
      echo '<a href=" ../vistas/reportesCreacion.php?nombre=' . $client->getNombre() . '&apellido=', $client->getApellido() . '&rol=Paciente&idReportante='.$userSession->getClienteActual().'&idReportado='.$client->getId() .'"><button type="button" class="btn buttonReport btn-danger">Reportar</button></a>';
      echo '<a href=" ../vistas/expediente.php"><button type="button" class="btn btn-danger">Expediente Medico </button></a>';
      echo '<a href="#"><button type="button" class="btn btn-danger">Historial Medico</button></a>';
    }
    echo '</div>';
    echo '<div class="datosUsuario">
             <form>
             <label>Nombre:</label><input type="text" id="nombre" disabled value="' . $client->getNombre() . '">
             <label>Apellido:</label><input type="text" id="apellido" disabled value="' . $client->getApellido() . '">
             <label>Correo Electrónico:</label><input type="email" id="email" disabled placeholder="' . $client->getCorreo() . '">
             <label>Sexo:</label><input type="text" id="sexo" disabled placeholder="' . $client->getSexo() . '">
             <label id="confPasswordLabel" style="display:none;">Contraseña:</label><input type="password" id="contrasenia" placeholder="Ingresar Contraseña..." required style="display: none;">
             <input type="submit" value="Confirmar Cambios" id="confCambios" class="confCambios" onclick="activateButton()">
           </form>
           <form id="cambiarContra" style="display:none;">
             <label id="newPasss">Nueva Contraseña:</label><input type="password" id="newPassInput">
             <label id="confPasswordLabel">Confirmar Contraseña:</label><input type="password" id="confPassword">
             <input type="button" name="guardarCambios" value="Guardar Cambios" class="guardarCambios">;
           </form>
           </div>';
  }
}
else {
  echo '<div class="fotoPerfil">
          <img src="' . $user->getFoto() . '">
          <input type="button" id="fotoPerfil" onclick="fotoPerfil()" value="Cambiar foto de perfil">
          <form method="POST" action="../controlador/crtActuFoto.php" enctype="multipart/form-data">
          <input type="file" id="subirArchivo" name="foto" accept=".png, .jpeg" style="display:none;">
          <input type="submit" value="Confirmar Cambios" id="confCambiosFoto" class="confCambios" style="display:none;">
          </form>';
  if ($cliente){ 
    echo '<a href=" ../vistas/expediente.php"><button type="button" class="btn btn-danger">Expediente Medico </button></a>';
  }
  echo '</div>';
    echo '<div class="datosUsuario">
		'.$error.'
          <form method="POST" action="../controlador/crtActuData.php">
            <label>Nombre:</label><input type="text" id="nombre" name="nombre" disabled value="' . $user->getNombre() . '">
            <label>Apellido:</label><input type="text" id="apellido" name="ape" disabled value="' . $user->getApellido() . '">
            <label>Correo Electrónico:</label><input type="email" id="email" name="mail" disabled value="' . $user->getCorreo() . '">
            <label>Sexo:</label><input type="text" id="sexo" name="sexo" disabled value="' . $user->getSexo() . '">';
          if($doctor){
            echo ' <label>Titulos Profesionales:</label><input type="text" id="titulos" name="titulo" disabled placeholder="Titulos..." value="'.$user->getTitulos().'"></textarea>';
          }

            echo '<label id="confPasswordLabel" style="display:none;">Contraseña:</label><input type="password" id="contrasenia" name="passCon" placeholder="Ingresar Contraseña..." required style="display: none;">
            <input type="submit" value="Confirmar Cambios" id="confCambios" class="confCambios" onclick="activateButton()">
          </form>
          <form id="cambiarContra" style="display:none;" method="POST" action="../controlador/crtActuPass.php">
            <label id="newPasss">Nueva Contraseña:</label><input type="password" id="newPassInput" name="pass">
            <label id="confPasswordLabel">Antigua Contraseña:</label><input type="password" id="confPassword" name="passCon">
            <input type="submit" name="guardarCambios" value="Guardar Cambios" class="guardarCambios">;
          </form>
        </div>';

}
?>
    </div>
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
              Nosotros somos Nova-medic y queremos darte las Gracias por confiar tu salud en nosotros. Disfruta
              Nova-Medic
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

	<script src="../js/estado.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>

</body>
</body>

</html>
