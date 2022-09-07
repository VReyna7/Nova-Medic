<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
    <link href="../css/reporte.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>reportes</title>
    <?php
	  require_once("../modelo/class.conexion.php");
	  require_once("../modelo/class.sesion.php");
    require_once("../modelo/class.admin.php");
    require_once("../modelo/class.doctor.php");
    require_once("../modelo/class.cliente.php");
    require_once("../modelo/class.reportes.php");
    error_reporting(0);
    $client = new Cliente();
    $doc = new Doctor();
	  $userSession = new Sesion();
    $reporte = new Reportes();

    if (isset($_SESSION['admin'])) {
      $user = new Admin();
      $user->setAdmin($userSession->getAdminActual());
    } else
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
                        <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexAdmin.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="creacionCuentas.php">CREACIÓN DE CUENTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="visualizaCuentas.php">USUARIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-6  active navbar-brand" href="#">REPORTES</a>
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

    <div class="contenMain">
        <div class="contenSub1">
            <h2>Grafica de reportes</h2>
           <canvas id="oilChart"></canvas>
        </div>
        <div class="contenSub2">
            <h2>Lista de Reportes</h2>
              <?php 
              $reports = $reporte->mostrarReportes();
              $doctorReports = $reporte->searchReports("Doctor");
              $clienteReports = $reporte->searchReports("Paciente");
              foreach($reports as $mostrar){
                echo '
                <div class="subConten2_1">
                <div class="ContenidoReporte1">
                <h4>Reportante :'.$mostrar["reportante"].'</h4> 
                <h4>Reportado : '.$mostrar["reportado"].'</h4>';
                if($mostrar["rolReportado"]=="Doctor"){
                  if($doc->getBaneo($mostrar["idReportado"]) == 0 ){
                    echo '  <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Banear"><input type="button" value="Banear" class="btn btn-danger"></a>
                    <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Eliminar"><input type="button" value="Eliminar Reporte" class="btn btn-danger"></a>';
                  }else{
                  echo ' <a href="#"><input type="button" value="Usuario Baneado" class="btn btn-danger"></a>
                  <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Eliminar"><input type="button" value="Eliminar Reporte" class="btn btn-danger"></a>';
                 }
                }else{
                  if($client->getBaneo($mostrar["idReportado"]) == 0){
                    echo '  <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Banear"><input type="button" value="Banear" class="btn btn-danger"></a>
                    <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Eliminar"><input type="button" value="Eliminar Reporte" class="btn btn-danger"></a>';
                  }else{
                    echo ' <a href="#"><input type="button" value="Usuario Baneado" class="btn btn-danger"></a>
                    <a href="../controlador/crtBanyDelReport.php?idReportado='.$mostrar["idReportado"].'&idReportante='.$mostrar["idReportante"].'&rol='.$mostrar["rolReportado"].'&accion=Eliminar"><input type="button" value="Eliminar Reporte" class="btn btn-danger"></a>';
                  }
                }
              
              echo '
             </div>
             <div class="ContenidoReporte2">
                 <h4>Descripcion de reporte:</h4>
                 <p>'.$mostrar["descripcion"].'</p>
             </div>
             </div>';
              }
              ?>
         
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
    <script >
     const $grafica = document.querySelector("#oilChart");
// Las etiquetas son las porciones de la gráfica
const etiquetas = ["Pacientes", "Doctores"]
// Podemos tener varios conjuntos de datos. Comencemos con uno

const datosIngresos = {
    data: [<?php echo $clienteReports ?>,<?php echo $doctorReports ?> ,], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
    // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
    backgroundColor: [
        '#f28cd7',
        '#f8b1bb',
    ],// Color de fondo
    borderColor: [
     
        '#f28cd7',
        '#f8b1bb',
    ],// Color del borde
    borderWidth: 1,// Ancho del borde
};
new Chart($grafica, {
    type: 'pie',// Tipo de gráfica. Puede ser dougnhut o pie
    data: {
        labels: etiquetas,
        datasets: [
            datosIngresos,
            // Aquí más datos...
        ]
    },
});
    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>