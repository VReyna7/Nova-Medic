<?php session_start();
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.sesion.php");

$doc = new Doctor;
$sesion = new Sesion;

$doc->setDoctor($sesion->getDoctorActual());
echo $doc->getEstado();

