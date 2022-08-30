<?php session_start();
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.sesion.php');

$doc = new Doctor;
$sesion = new Sesion;

$doc->setDoctor($sesion->getDoctorActual());
if ($doc->getEstado() == '1') {
  //Estado 2 es ocupado
  $doc->cambiarEstado('2');
  header("location: ../vistas/indexDoctor.php");
} else if ($doc->getEstado() == '2') {
  $doc->cambiarEstado('1');
  header("location: ../vistas/indexDoctor.php");
}
