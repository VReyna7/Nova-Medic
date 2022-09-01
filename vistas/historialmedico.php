<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/historialmedico.css?v=<?php echo time(); ?>">
    <script src="../js/scrollreveal.js"></script>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Expediente medico</title>
    <link rel="icon" href="../img/favicon.ico">
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
                <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="../index.html" >INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  fs-6 navbar-brand" href="iniciosesion.php" >INICIAR SESION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active fs-6 navbar-brand" href="#">REGISTRARSE</a>
              </li>
            </ul>
          </div>
    </nav>

    <div class="div-form">
      <form class="colorito" id="colorito" method="POST" action="../controlador/crtExpedienteMedico.php">
        <label for="colorito" class="text-white fs-5">Expendiente Medico</label>
        <?php
          if(isset($error)){
            echo "<p>".$error."</p>";
          }
        ?>
        <div></div>
        <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">¿Ha tenido reacciones alergicas a medicamentos?</label>
                <div class="optiontexts">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input alergiasSi" type="radio" name="alerMedi" id="inlineRadio1" value="Si">
                    <label class="form-check-label text-white" for="inlineRadio1">Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input alergiasNo" type="radio" name="alerMedi" id="inlineRadio2" value="No">
                    <label class="form-check-label text-white" for="inlineRadio2">No</label>
                  </div>
                </div>
              </div>
            <input type="text" class="form-control especific-text-form espcifique1" placeholder="Especifique" id="especifique" name="text_medicina">
          </div>

          <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">Tipo de sangre</label>
                <div class="optiontexts">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="A+">
                    <label class="form-check-label text-white" for="inlineRadio1">A+</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="O+">
                    <label class="form-check-label text-white" for="inlineRadio2">O+</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="B+">
                    <label class="form-check-label text-white" for="inlineRadio2">B+</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="AB+">
                    <label class="form-check-label text-white" for="inlineRadio2">AB+</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="A-">
                    <label class="form-check-label text-white" for="inlineRadio2">A-</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="O-">
                    <label class="form-check-label text-white" for="inlineRadio2">O-</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="B-">
                    <label class="form-check-label text-white" for="inlineRadio2">B-</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sangre" id="inlineRadio3" value="AB-">
                    <label class="form-check-label text-white" for="inlineRadio2">AB-</label>
                  </div>
                </div>
              </div>
          </div>
        
          <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">¿Es alergico a algún animal o comida?</label>
                <div class="optiontexts">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="alergia" id="inlineRadio4" value="Si" id="comidaSi">
                    <label class="form-check-label text-white" for="inlineRadio1">Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="alergia" id="inlineRadio5" value="No" id="comidaNo">
                    <label class="form-check-label text-white" for="inlineRadio2">No</label>
                  </div>
                </div>
              </div>
            <input type="text" class="form-control especific-text-form2" placeholder="Especifique" id="especifique2" name="Text_anima">
          </div>

          <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">¿Ha sido tratado psicologicamente alguna vez?</label>
                <div class="optiontexts">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="psicologia" id="inlineRadio6" value="Si">
                    <label class="form-check-label text-white" for="inlineRadio1">Si</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="psicologia" id="inlineRadio7" value="No">
                    <label class="form-check-label text-white" for="inlineRadio2">No</label>
                  </div>
                </div>
              </div>
          </div>


          <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">¿Cual es su altura? (En Metros)</label>
              </div>
            <input type="text" class="form-control especific-text-form3" placeholder="Especifique" name="altura" min="0">
          </div>

          <div class="row">
            <div class="Options">
                <label for="form-control " class="text-white">¿Cual es su Peso? (en kg)</label>
              </div>
            <input type="text" class="form-control especific-text-form4" placeholder="Especifique" name="peso" min="0">
          </div>



          <input type="submit" class="btn btn-primary botonsito" value="Registrarse">
      </form>
     <!-- <div class="divimagen">
      </div>-->
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
<script src="../js/iniciodesesion.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/Expedientemedico.js"> </script>
</body>
</body>
</html>