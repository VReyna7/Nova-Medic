<?php session_start();
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.sesion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.chat.php');

$clt = new Cliente;
$doc = new Doctor;
$chat = new Chat;
$sesion = new Sesion;

$idC = isset($_POST['idC'])?$_POST['idC']:"";
$idDoc = isset($_POST['idDoc'])?$_POST['idDoc']:"";

if(isset($_SESSION['doctor'])){
    $data = $chat->mostrarMsg( $idDoc ,$idC);
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
                        echo '<h3>'. $msg['usuario'] .'</h3>';
                        echo '<div class="contenedorDeMensaje">';
                            echo '<p>'. $msg['msg'] .'</p>';
                      	echo '</div>';
                    echo '</div>';
                echo '</div>';
        }elseif($msg['tipo']==1){
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
	}else{
		header("lcoation: ../vistas/iniciosesion.php");
	}
