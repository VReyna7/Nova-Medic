<?php session_start();
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.admin.php");
require_once("../modelo/class.sesion.php");

//Se inician las seciones
$clnt = new Cliente;
$doc = new Doctor;
$admin = new Admin;
$sesion = new Sesion;

//Se obtienen los datos del form
$nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
$ape = isset($_POST['ape'])?$_POST['ape']:"";
$mail = isset($_POST['mail'])?$_POST['mail']:"";
$sexo = isset($_POST['sexo'])?$_POST['sexo']:"";

try{
	if(isset($_SESSION['cliente'])){
		$clnt->setCliente($sesion->getClienteActual());
		if($pass==$clnt->getPass()){
			$clnt->actuData($nombre,$ape,$mail,$sexo);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, la contraseña esta incorrecta";
			include "../vistas/perfil.php";
		}
	}else if(isset($_SESSION['doctor'])){
		$doc->setDoctor($sesion->getDoctorActual());
		if($pass==$doc->getPass()){
			$doc->actuData($nombre,$ape,$mail,$sexo);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, la contraseña esta incorrecta";
			include "../vistas/perfil.php";
		}
	}else if(isset($_SESSION['admin'])){
		$admin->setAdmin($sesion->getAdminActual());
		if($pass==$admin->getPass()){
			$admin->actuData($nombre,$ape,$mail,$sexo);
			header("location: ../vistas/perfil.php");
		}else{
			$error = "Error, la contraseña esta incorrecta";
			include "../vistas/perfil.php";
		}
	}
}catch(Exception $e){
	$error = $e->getMessage();
	include "../vistas/perfil.php";
}
