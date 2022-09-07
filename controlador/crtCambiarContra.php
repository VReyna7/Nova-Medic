
<?php
session_start();
error_reporting(0);

require_once('../modelo/class.conexion.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.admin.php');
require_once('../modelo/class.sesion.php');

$doc = new Doctor;
$admin = new Admin;
$userSession = new Sesion();

$contra = isset($_POST['contra']) ? $_POST['contra'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";


 if (isset($_SESSION['doctor'])) {
    $doc->setDoctor($userSession->getDoctorActual());
    if($contra == $pass){
        $doc->modificarContra($doc->getId(),$contra,1);
        header("location: ../vistas/indexDoctor.php");
    }else{
        $errorLog = "Error. Las contraseñas no coinciden";
        include_once("../vistas/cambiarContra.php");
    }
} else if (isset($_SESSION['admin'])){
    $admin->setDoctor($userSession->getAdminActual());
    if($contra == $pass){
        $admin->modificarContra($doc->getId(),$contra,1);
        header("location: ../vistas/indexAdmin.php");
    }else{
        $errorLog = "Error. Las contraseñas no coinciden";
        include_once("../vistas/cambiarContra.php");
    }
}else{
    include_once("../vistas/iniciosesion.php");
}

    


  ?>
