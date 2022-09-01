<?php
session_start();
?>
<?php
require_once("../modelo/class.sesion.php");
require_once("../modelo/class.doctor.php");
$sesion = new Sesion();
$doc = new Doctor;



$sesion->cerrarSesion();
header("location: ../index.html");
?>