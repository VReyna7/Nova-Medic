<?php session_start();
error_reporting(0);
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.admin.php");
require_once("../modelo/class.sesion.php");

$clnt = new Cliente;
$doc = new Doctor;
$admin = new Admin;
$sesion = new Sesion;

$pass = isset($_POST['pass'])?$_POST['pass']:"";
$passCon = isset($_POST['passCon'])?$_POST['passCon']:"";

try{
	if(isset($_SESSION['cliente'])){
		$clnt->setCliente($sesion->getClienteActual());
		if(md5($passCon) == $clnt->getPass()){
			$clnt->actuPass($pass);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, contraseña incorrecta";
			include "../vistas/perfil.php";
		}
	}else if(isset($_SESSION['doctor'])){
		$doc->setDoctor($sesion->getDoctorActual());
		if(md5($passCon) == $doc->getPass()){
			$doc->actuPass($pass);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, contraseña incorrecta";
			include "../vistas/perfil.php";
		}
	}else if(isset($_SESSION['admin'])){
		$admin->setAdmin($sesion->getAdminActual());
		if(md5($passCon) == $clnt->getPass()){
			$admin->actuPass($pass);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, contraseña incorrecta";
			include "../vistas/perfil.php";
		}
	}
}catch(Exception $e){
	$error = $e->getMessage();
	include "../vistas/perfil.php";
}

