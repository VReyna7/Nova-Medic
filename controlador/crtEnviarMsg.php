<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.sesion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.doctor.php');

$chat = new Chat();
$userSession = new Sesion();
$id = 1; //$_GET['id'];

if(isset($_SESSION['cliente'])){
	$clnt = new Cliente();
	$clnt->setCliente($userSession->getClienteActual());
	if(isset($_POST['solicitarlCall'])){
	echo("entro");
    $msg ="El paciente solicita una video llamada";
    $chat->enviarMsg($clnt->getNombre(),$msg,$id,$clnt->getId(),0);	
    }else if(isset($_POST['enviarMsg'])){
        $msg = $_POST['msg'];
        $chat->enviarMsg("victor",$msg,$id,$clnt->getId(),0);		
    }
	header("location: ../vistas/chat.php");
}elseif(isset($_SESSION['doctor'])){
	$doc= new Doctor();
	$doc->setDoctor($userSession->getDoctorActual());
	$msg = $_POST['msg'];
	$chat->enviarMsg($doc->getNombre(),$msg,$id,$doc->getId,0);		
	$chat->enviarMsg($doc->getNombre(), $msg,$id,$$doc->getId(),1);	
	header("location: ../vistas/chat.php");
}else
	header("location: ../vistas/vis.inicioSesion.php");

?>