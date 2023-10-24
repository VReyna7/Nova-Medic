<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHAT</title>

  <!-- FONTAWESOME FONTS & ICONS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- BOOTSTRAP 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- STYLESHEET -->
  <link rel="stylesheet" href="../css/chats.css">
  <link rel="stylesheet" href="../css/estado.css?v=<?php echo time(); ?>">
  
  <?php
  require_once('../modelo/class.conexion.php');
  require_once('../modelo/class.cliente.php');
  require_once('../modelo/class.doctor.php');
  require_once('../modelo/class.sesion.php');
  require_once('../modelo/class.chat.php');

  $idDoc = isset($_GET['idDoc']) ? $_GET['idDoc'] : "";
  $idC = isset($_GET['idC']) ? $_GET['idC'] : "";
  error_reporting(0);
  $chat = new Chat();
  $userSession = new Sesion();

  if (isset($_SESSION['cliente'])) {
    $user = new Cliente();
    $user->setCliente($userSession->getClienteActual());
    $cliente = true;
    $doctor = false;
  } else if (isset($_SESSION['doctor'])) {
    $user = new Doctor();
    $doctor = true;
    $user->setDoctor($userSession->getDoctorActual());
  } else {
    header("location: ../vistas/iniciosesion.php");
  }
  ?>
</head>

<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
      <a class="navbar-brand fs-4" href="#">NOVA MEDIC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link fs-6 navbar-brand active" href="chat.php">CHAT</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand " href="../vistas/perfil.php">PERFIL</a>
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
        } else if ($cliente) {
          echo '  <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexPaciente.php" >INICIO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="iniciarConsulta.php" >INICIAR CONSULTA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand active" href="chat.php">CHAT</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand " href="perfil.php">PERFIL</a>
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
  <div class="containerbuton">

    <div class="btn-menu">
      <label for="btn-menu">➢</label>
      <?php
      if ($doctor && !empty($idC) && !empty($idDoc)) {
        echo '<a href="../vistas/registroHistorialMedico.php?idDoc='.$idDoc.'&idC='.$idC.'"><input type="submit" value="Crear Historial" name="agregarExpediente" class="Add" id="agregarExpe"></a>';
        echo '<a href="historialMedico.php?idC='.$idC.'"><input type="submit" value="Ver Historial" name="agregarExpediente" class="Add" id="agregarExpe"></a>';
        echo '<a href="perfil.php?idClient='.$idC.'&accion=Visualizar&rol=Cliente&vista=Chat"><input type="submit" value="Ver Perfil" name="agregarExpediente" class="Add" id="agregarExpe"></a>';
        echo '<a href="../controlador/crtFinalizarConsult.php?idDoc=' . $idDoc . '&dC=' . $idC . '"><input type="submit" value="Finalizar consulta" name="agregarExpediente" class="Add" id="agregarExpe"></a>';
      }else if($cliente && !empty($idC) && !empty($idDoc)){
        echo '<a href="perfil.php?idDoc='.$idDoc.'&accion=Visualizar&rol=Doctor&vista=chat"><input type="submit" value="Ver Perfil" name="agregarExpediente" class="Add" id="agregarExpe"></a>';
      }
      ?>

    </div>
    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
      <div class="cont-menu">
        <nav>
          <ul class="acorh">
            <?php
            if ($doctor) {
              $chats = $chat->veriChatDoctor($userSession->getDoctorActual());
              foreach ($chats as $mostrar) {
                echo '<li>
                            <a href="chat.php?idC=' . $mostrar["idC"] . '&idDoc=' . $mostrar["idDC"] . '"> 
                              <div class="chat">
                              <p>' . $mostrar["nameC"] . '</p>
                              </div>
                            </a>
                          </li>';
              };
            } else if ($cliente) {
              $chats = $chat->veriChatClient($userSession->getClienteActual());
              echo '<li><a href="#">Medicinal Gneral</a>
                          <ul class="ulMediGenral">';
              foreach ($chats as $mostrar) {
                if ($mostrar['espec'] == "Doctor General")
                  echo '<li>
                            <a href="chat.php?idC=' . $mostrar["idC"] . '&idDoc=' . $mostrar["idDC"] . '"> 
                              <div class="chat">
                    
                              <p>' . $mostrar["nameDR"] . '</p>
                              </div>
                            </a>
                          </li>';
              }
              echo '</ul>';

              echo '<li><a href="#">Psicologia</a>
                        <ul class="ulMediGenral">';
              foreach ($chats as $mostrar) {
                if ($mostrar['espec'] == "Psicologia")
                  echo '<li>
                          <a href="chat.php?idC=' . $mostrar["idC"] . '&idDoc=' . $mostrar["idDC"] . '"> 
                            <div class="chat">
                  
                            <p>' . $mostrar["nameDR"] . '</p>
                            </div>
                          </a>
                        </li>';
              }
              echo '</ul>';

              echo '<li><a href="#">Nutriocinistas</a>
                        <ul class="ulMediGenral">';
              foreach ($chats as $mostrar) {
                if ($mostrar['espec'] == "Nutricionista")
                  echo '<li>
                          <a href="chat.php?idC=' . $mostrar["idC"] . '&idDoc=' . $mostrar["idDC"] . '"> 
                            <div class="chat">
                            <p>' . $mostrar["nameDR"] . '</p>
                            </div>
                          </a>
                        </li>';
              }
              echo '</ul>';
            }

            ?>




          </ul>
        </nav>
        <label for="btn-menu">✖️</label>
      </div>
    </div>
  </div>

  <div class="subContainer1">

    <div class="ContKing">
      <div class="chatBody">
        <?php
        if (empty($idC) && empty($idDoc)) {
          echo '<h4 class="h4_Text">Puedes entrar a los chats en el icono de ➢</h4>';
        }
        ?>
      </div>
      <div class="OpChat">
        <form method="POST" class="enviarMensaje">
          <?php
          if (isset($_SESSION['cliente'])) {
  
            if (!empty($idC) && !empty($idDoc)) {
                echo '<button type="button" id="btnCall" name="solicitarlCall"><img src="../img/call.png" class="imgbutton" /></button>
            <input type="hidden" name="id" class="id" value="' . $idDoc . '">';
            }
          } else if (isset($_SESSION['doctor'])) {
            if (!empty($idC) && !empty($idDoc)) {
              echo '<a href="http://meet.google.com/new" id="btnCall" target="blank"><img src="../img/call.png" class="imgbutton" /></a>
          <input type="hidden" name="id" class="id" value="' . $idC . '">';
            }
          }

          if (!empty($idC) && !empty($idDoc)) {
            echo '<input class="textMSG" placeholder="Escribe un mensaje aqui" type="text" name="msg" onclick="hastaAbajo()" autocomplete="off">
      <input type="submit" value="enviar" name="enviarMsg" class="enviar" onclick="hastaAbajo()" id="btnEnviar">';
          }
          ?>


        </form>
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
    </section>

</body>
<?php
if (!empty($idC) && !empty($idDoc)) {
}
?>
<script src="../js/chat.js"></script>
<script src="../js/estado.js"></script>
</html>
