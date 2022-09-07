<?php
session_start();
error_reporting(0);
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.doctor.php');
require_once('../modelo/class.admin.php');
require_once('../modelo/class.sesion.php');

$clnt = new Cliente;
$doc = new Doctor;
$admin = new Admin;
$sesion = new Sesion;

$mail = isset($_POST['mail']) ? $_POST['mail'] : "";
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";


if (isset($_SESSION['cliente'])) {
    //$clnt->setCliente($_SESSION['cliente']);
    header("location: ../vistas/indexPaciente.php");
    echo $_SESSION['cliente'];
} else if (isset($_SESSION['doctor'])) {
    header("location: ../vistas/indexDoctor.php");
} else if (isset($_SESSION['admin'])) {
    header("location: ../vistas/indexAdmin.php");
} else if ($clnt->searchCliente($mail, md5($pass))) {
    $clnt->sesionCliente($mail);
    if($clnt->getBaneo($clnt->getId())==1){
        $errorLog = "Tu cuenta ha sido suspendida.";
        include_once("../vistas/iniciosesion.php");
    }else{
        $sesion->setClienteActual($clnt->getId());
        header("location: ../vistas/indexPaciente.php");
    }
} else if ($doc->searchDoctor($mail, md5($pass))){
    $doc->sesionDoctor($mail);
    if($doc->getBaneo($doc->getId())==1){
        $errorLog = "Tu cuenta ha sido suspendida.";
        include_once("../vistas/iniciosesion.php");
    }else{
        $sesion->setDoctorActual($doc->getId());
        $verifiInnicioSSesion = $doc->getchangePass($doc->getId());
    }
    

    if($verifiInnicioSSesion == 0){
        echo $doc->getId();
        header("location: ../vistas/cambiarContra.php");
    }else{
        header("location: ../vistas/indexDoctor.php");
    }
   
} else if ($admin->searchAdmin($mail, md5($pass))) { 
    echo $mail;
    $admin->sesionAdmin($mail);
    echo $admin->getId();
    $sesion->setAdminActual($admin->getId());
    $verifiInnicioSSesion = $admin->getchangePass($admin->getId());
    if($verifiInnicioSSesion == 0){
        echo $admin->getId();
        header("location: ../vistas/cambiarContra.php");
    }else{
        header("location: ../vistas/indexAdmin.php");
    }
} else {
    $errorLog = "Error. Correo o contraseña son incorrectos";
    include_once("../vistas/iniciosesion.php");
}
