<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.cliente.php');
require_once('../modelo/class.sesion.php');

$cltn = new Cliente();
$sesion = new Sesion();

$nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
$ape = isset($_POST['ape'])?$_POST['ape']:"";
$sexo = isset($_POST['sex'])?$_POST['sex']:"";
$fecha = isset($_POST['fecha'])?$_POST['fecha']:"";
$mail = isset($_POST['mail'])?$_POST['mail']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";

try{
    $cltn->veriData($nombre,$ape,$pass,$mail,$sexo,$fecha);
    if(!$cltn->extCliente($mail)){
        $cltn->newCliente();
        $cltn->setCliente($mail);
        //Sesiones
        session_start();
        $sesion->setClienteActual($cltn->getId());
        header("location: ../vistas/historialmedico.php");
    }else{
        $error = "Error. Este correo ya esta en uso";
        include_once("../vistas/registro.php");
    }
}catch (Exception $e){
    $error = $e->getMessage();
    include_once("../vistas/registro.php");
}
?>