<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');

$chat = new Chat();
$userSession = new Sesion();
$id = $_GET['id'];
$msg = $_POST['msg'];

if(isset($_SESSION['cliente'])){
	$clnt = new Cliente();
	$clnt->setCliente($userSession->getClienteActual());
	$chat->enviarMsg($clnt->getNombre(), $msg,$id,$clnt->getId(),0);	
	header("location: ../vistas/vis.chat.php?id=".$id);
}elseif(isset($_SESSION['doctor'])){
	$doc= new Doctor();
	$doc->setDoctor($userSession->getDoctorActual());
	$chat->enviarMsg($doc->getNombre(), $msg,$prof->getId(),$id,1);	
	header("location: ../vistas/vis.chat.php?id=".$id);
}else
	header("location: ../vistas/vis.inicioSesion.php");

?>