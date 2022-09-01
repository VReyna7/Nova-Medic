<?php
	require_once("../modelo/class.conexion.php");
	require_once("../modelo/class.consulta.php");
	require_once("../modelo/class.doctor.php");
	require_once("../modelo/class.sesion.php");

	$consult = new Consulta();

    $descripcion = isset($_POST['descripcion'])?$_POST['descripcion']:"";
    $idDoctor = isset($_POST['idDoctor'])?$_POST['idDoctor']:"";   
    $idCliente = isset($_POST['idCliente'])?$_POST['idCliente']:"";  
	$category = isset($_POST['category'])?$_POST['category']:"";  

	$consult->setConsul($idCliente, $idDoctor, $descripcion);
	$consult->newConsulta();

	header("location: ../vistas/doctoresConsul.php?category=".$category);
?>