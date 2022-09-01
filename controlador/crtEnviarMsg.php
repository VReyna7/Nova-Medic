<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.sesion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.doctor.php');

$chat = new Chat();
$userSession = new Sesion();
$id = $_POST["id"];

if(isset($_SESSION['cliente'])){
	$clnt = new Cliente();
	$clnt->setCliente($userSession->getClienteActual());
	if(isset($_POST['solicitarlCall'])){
	echo("entro");
    $msg ="El paciente solicita una video llamada";
    $chat->enviarMsg($clnt->getNombre(),$msg,$clnt->getId(),$id,0,"Cliente");	
    }else if(isset($_POST['enviarMsg'])){
        $msg = $_POST['msg'];
        $chat->enviarMsg($clnt->getNombre(),$msg,$clnt->getId(),$id,0,"Cliente");		
    }
	header("location: ../vistas/chat.php?idDoc=".$id."&idC=".$clnt->getid());
}elseif(isset($_SESSION['doctor'])){
	$doc= new Doctor();
	$doc->setDoctor($userSession->getDoctorActual());
	$msg = $_POST['msg'];	
	$chat->enviarMsg($doc->getNombre(), $msg,$id,$doc->getid(),1,"Doctor");	
	header("location: ../vistas/chat.php?idC=".$id."&idDoc=".$doc->getid());
}else
	header("location: ../vistas/vis.inicioSesion.php");

?>