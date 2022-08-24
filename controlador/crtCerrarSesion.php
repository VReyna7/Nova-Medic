<?php
session_start();
?>
<?php
require_once("../modelo/class.sesion.php");
require_once("../modelo/class.doctor.php");
$sesion = new Sesion();
$doc = new Doctor;

if(isset($_SESSION['doctor'])){
    $doc->cambiarEstado($_SESSION['doctor']);
}

$sesion->cerrarSesion();
header("location: ../index.html");
?>