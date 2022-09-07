<?php session_start();
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.sesion.php');

$doc = new Doctor;
$sesion = new Sesion;

$estado = isset($_POST['estado'])?$_POST['estado']:"";

$doc->setDoctor($sesion->getDoctorActual());
$doc->cambiarEstado($estado);
