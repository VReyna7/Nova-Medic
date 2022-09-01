<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT</title>
    <link rel="stylesheet" href="../css/chat.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <?php
    require_once('../modelo/class.conexion.php');
    require_once('../modelo/class.cliente.php');
    require_once('../modelo/class.doctor.php');
    require_once('../modelo/class.sesion.php');
    require_once('../modelo/class.chat.php');

    $idDoc = isset($_GET['idDoc'])?$_GET['idDoc']:"";
    $idC = isset($_GET['idC'])?$_GET['idC']:"";

    $chat = new Chat();
    $userSession = new Sesion();

      if(isset($_SESSION['cliente'])){
       $user = new Cliente();
       $user->setCliente($userSession->getClienteActual());
       $cliente = true;
      }else if(isset($_SESSION['doctor'])){
        $user = new Doctor();
        $doctor = true;
        $user->setDoctor($userSession->getDoctorActual());
      }else{
           header("location: ../vistas/iniciosesion.php");
      }
    ?>
</head>
<div>
 <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <img src="../img/My project.png" width="90" height="90" class="d-inline-block align-top" alt="">
            <a class="navbar-brand fs-4" href="#" >NOVA MEDIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
             <?php 
                if ($doctor){
                  echo '<ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexDoctor.php" >INICIO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="../vistas/aceptarConsultas.php" >INICIAR CONSULTA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="chat.html">CHAT</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand active" href="../vistas/perfil.php">PERFIL</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="../controlador/crtCerrarSesion.php">CERRAR SESION</a>
                      </li>
                    </ul>';
                }else if($cliente){
                  echo '  <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        <a class="nav-link  fs-6 navbar-brand" aria-current="page" href="indexPaciente.php" >INICIO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="iniciarConsulta.php" >INICIAR CONSULTA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand" href="chat.php">CHAT</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-6 navbar-brand active" href="perfil.php">PERFIL</a>
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
        
    <div class="menu__side" id="menu_side">

        

        <div class="options__menu">	
            <a href="#">
                <div class="option">
                  
                </div>
            </a>

            <a href="#">
                <div class="option">
                  
                </div>
            </a>
        <ul class="chatDespliegue">
            
       <li>
        <a href="" class="selected">
            <div class="option">
                <i class="far fa-address-card" title="Psicologia"></i>
                <h4>Psicologia</h4>
            </div>
        </a>

        <a href="#" class="selected">
            <div class="option">
                <i class="far fa-address-card" title="Medicina general"></i>
                <h4>Medicina general</h4>
                
            </div>
        </a>
        <a href="#" class="selected">
            <div class="option">
                <i class="far fa-address-card" title="Nutricion"></i>
                <h4>Medicina general</h4>
                
            </div>
        </a>
        <ul class="lischat">
                  <?php 
                          if($doctor){
                            $chats = $chat->veriChatDoctor($userSession->getDoctorActual());
                            foreach ($chats as $mostrar){
                            echo '<li>
                            <a href="chat.php?idC='.$mostrar["idC"].'&idDoc='.$mostrar["idDC"].'"> 
                              <div class="chat">
                              <img src="'.$chat->getImagenPerfilClient($mostrar["idC"]).'">
                              <p>'.$mostrar["nameC"].'</p>
                              </div>
                            </a>
                          </li>';
                           }
                        }
                  ?>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
            <li>
              <a href=""> 
                <div class="chat">
                <img src="img/disc-perfil-c-azul-948x640.jpg">
                <p>Dr. Jose peña nieto</p>
                </div>
              </a>
            </li>
        </ul>
    </li>
   
    </ul>
      
    
            

            

      </div>
       

    </div>
    
    <div class="ContKing">

    <div class="chatBody">
    <?php
          

    
				if(isset($_SESSION['doctor'])){
					$data = $chat->mostrarMsg( $idC ,$idDoc);
					foreach($data as $msg){
        			if($msg['tipo']==1){
					echo '<div class="panelMensajeDerecho">';
            			echo '<div class="chat-cuerpo">';
            	    		echo '<h3>'. $msg['usuario'] .'</h3>';
            	    		echo '<div class="contenedorDeMensaje">';
            	        		echo '<p>'. $msg['msg'] .'</p>';
            	    		echo '</div>';
            			echo '</div>';
        			echo '</div>';
					}elseif($msg['tipo']==0){
					echo '<div class="panelMensajeIzquiendo">';
            			echo '<div class="chat-cuerpo">';
            	    		echo '<h3>'. $msg['usuario'] .'</h3>';
            	    		echo '<div class="contenedorDeMensaje">';
               		     		echo '<p>'. $msg['msg'] .'</p>';
                			echo '</div>';
            			echo '</div>';
        			echo '</div>';
					}
					}
				}elseif(isset($_SESSION['cliente'])){
					$data = $chat->mostrarMsg($idDoc,$idC);
					foreach($data as $msg){
					if($msg['tipo']==0){
					echo '<div class="panelMensajeDerecho">';
            			echo '<div class="chat-cuerpo">';
                			echo '<h3>'. $msg['user'] .'</h3>';
                			echo '<div class="contenedorDeMensaje">';
                    			echo '<p>'. $msg['msg'] .'</p>';
              		  		echo '</div>';
            			echo '</div>';
        			echo '</div>';
					}elseif($msg['tipo']==1){
					echo '<div class="panelMensajeIzquiendo">';
            			echo '<div class="chat-cuerpo">';
                			echo '<h3>'. $msg['user'] .'</h3>';
                			echo '<div class="contenedorDeMensaje">';
                    			echo '<p>'. $msg['msg'] .'</p>';
                			echo '</div>';
            			echo '</div>';
        			echo '</div>';
					}
					}
				}
			?>
       
    <!--  <div class="panelMensajeDerecho">
          <div class="chat-cuerpo">
              <h3></h3>
              <div class="contenedorDeMensaje">
                  <p>hola</p>
              </div>
          </div>
      </div>

      <div class="panelMensajeIzquiendo">
          <div class="chat-cuerpo">
              <h3></h3>
              <div class="contenedorDeMensaje">
                      <p>hola</p>
              </div>
          </div>
      </div>
      <div class="panelMensajeDerecho">
        <div class="chat-cuerpo">
            <h3></h3>
            <div class="contenedorDeMensaje">
                <p>hola</p>
            </div>
        </div>
    </div>

    <div class="panelMensajeIzquiendo">
        <div class="chat-cuerpo">
            <h3></h3>
            <div class="contenedorDeMensaje">
                    <p>hola</p>
            </div>
        </div>
    </div>
    <div class="panelMensajeDerecho">
      <div class="chat-cuerpo">
          <h3></h3>
          <div class="contenedorDeMensaje">
              <p>hola</p>
          </div>
      </div>
  </div>

  <div class="panelMensajeIzquiendo">
      <div class="chat-cuerpo">
          <h3></h3>
          <div class="contenedorDeMensaje">
                  <p>hola</p>
          </div>
      </div>
  </div>
  <div class="panelMensajeDerecho">
    <div class="chat-cuerpo">
        <h3></h3>
        <div class="contenedorDeMensaje">
            <p>hola</p>
        </div>
    </div>
</div>

<div class="panelMensajeIzquiendo">
    <div class="chat-cuerpo">
        <h3></h3>
        <div class="contenedorDeMensaje">
                <p>hola</p>
        </div>
    </div>
</div>-->
      

   
     
</div>
<div class="OpChat">
	<form action="../controlador/crtEnviarMsg.php"  method="POST">
	    <?php
	     if(isset($_SESSION['cliente'])){
	         
       echo'<button type="sumbit" id="btnCall" name="solicitarlCall"><img src="../img/call.png" class="imgbutton" /></button>
       <input type="hidden" name="id" value="'.$idDoc.'">';
       
      }else if(isset($_SESSION['doctor'])){
         echo '<a href="http://meet.google.com/new"><img src="../img/call.png" class="imgbutton2" /></a>
         <input type="hidden" name="id" value="'. $idC.'">';
         
      }
           
      
	    ?>

	  <input class="textMSG" placeholder="Escribe un mensaje aqui" type="text" name="msg" autocomplete="off">
		<input type="submit" value="enviar" name="enviarMsg" class="enviar" id="btnEnviar">
		</form>
    </div>
</div>
</body>
</html>