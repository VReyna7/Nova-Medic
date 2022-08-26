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

$mail = isset($_POST['mail'])?$_POST['mail']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";

if(isset($_SESSION['cliente'])){
    //$clnt->setCliente($_SESSION['cliente']);
   header("location: ../vistas/indexPaciente.php");
   echo $_SESSION['cliente'];
}else if(isset($_SESSION['doctor'])){
    header("location: ../vistas/indexDoctor.php");
}else if(isset($_SESSION['admin'])){
    header("location: ../vistas/indexAdmin.php");
}else if($clnt->searchCliente($mail,md5($pass))){
    $clnt->setCliente($mail);
    $sesion->setClienteActual($clnt->getId());
    header("location: ../vistas/indexPaciente.php");
}else if($doc->searchDoctor($mail, md5($pass))){
    $doc->setDoctor($mail);
    $sesion->setDoctorActual($doc->getId());
    header("location: ../vistas/indexDoctor.php");
}else if($admin->searchAdmin($mail, md5($pass))){
    $admin->setAdmin($mail);
    $sesion->setAdminActual($admin->getId());
    header("location: ../vistas/indexAdmin.php");
}else{
    $errorLog = "Error. Correo o contraseña son incorrectos";
    include_once("../vistas/iniciosesion.php");
}
?>