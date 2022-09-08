<?php session_start();
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.sesion.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.cliente.php");

$doc = new Doctor;
$clnt = new Cliente;
$sesion = new Sesion;

$fecha = date("d/m/Y");

$medico = isset($_POST['doctor'])?$_POST['doctor']:"";
$paciente = isset($_POST['paciente'])?$_POST['paciente']:"";
$razon = isset($_POST['razon'])?$_POST['razon']:"";
$descripcion = isset($_POST['descrip'])?$_POST['descrip']:"";
$receta = isset($_POST['receta'])?$_POST['receta']:"";
$idC = isset($_POST['idC'])?$_POST['idC']:"";
$idDoc = isset($_POST['idDoc'])?$_POST['idDoc']:"";

try{
	$doc->crearHistorial($medico,$paciente,$razon,$descripcion,$receta,$fecha,$idC,$idDoc);
	header("location: ../vistas/chat.php?idC=".$idC."&idDoc=".$idDoc);
}catch(Exception $e){
	$error = $e->getMessage();
	include "../vistas/registroHistorialMedico.php";
}
