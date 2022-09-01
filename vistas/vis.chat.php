<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vis.chat.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/65b3ef90af.js" crossorigin="anonymous"></script>
    <title>Chat</title>
	<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.profecional.php");
	require_once("../modelo/class.cliente.php");
	require_once("../modelo/class.userSession.php");
	require_once("../modelo/class.chat.php");

    error_reporting(0);

	$id = $_GET['id'];
	$userSession = new userSession();

	if(isset($_SESSION['doctor'])){
		$user = new Doctor();
		$user->setProfesional($userSession->getCurrentProfesional());
	}elseif(isset($_SESSION['cliente'])){
		$user = new Cliente();
		$user->setCliente($userSession->getCurrentCliente());
	}else
		header("location: ../vistas/vis.inicioSesion.php");
	?>

<script>
        function ajax(){
            setInterval(function(){ajax();, 1000});
        }
    </script>
</head>
<body onload="ajax();">
    <div class="ContKing">
        <div class="flechita"><a href="vis.listadoChats.php" class="flechitalink"><i class="fas fa-chevron-left"></a></i></div>
        <div class="chatBody">
			<?php
				$chat = new Chat();
				if(isset($_SESSION['profesional'])){
					$data = $chat->mostrarMsg($user->getId(),$id);
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
				}elseif(isset($_SESSION['cliente'])){
					$data = $chat->mostrarMsg($id, $user->getId());
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
    </div>
    <div class="OpChat">
	<form action="../controlador/enviarMsg.php?id=<?php echo $id;?>" method="POST">
		<input class="textMSG" placeholder="Escribe un mensaje aqui" type="text" name="msg" autocomplete="off">
		<input type="submit" value="enviar" name="enviarMsg" class="enviar">
		<i class="fas fa-paperclip labelFile"><input type="file"></i>
		</form>
    </div>
</div>
</body>
</html>