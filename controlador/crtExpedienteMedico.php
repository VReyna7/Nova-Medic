<?php
session_start();
require_once("../modelo/class.conexion.php");
require_once("../modelo/class.sesion.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.expedienteMedico.php");

$exp = new Expediente;

$peso = isset($_POST['peso'])?$_POST['peso']:"";
$estatura = isset($_POST['altura'])?$_POST['altura']:"";
$sangre = isset($_POST['sangre'])?$_POST['sangre']:"";
$alergia = isset($_POST['alergia'])?$_POST['alergia']:"";
$psico = isset($_POST['psicologia'])?$_POST['psicologia']:"";
$alerMedi = isset($_POST['alerMedi'])?$_POST['alerMedi']:"";

try{
    $exp->veriData($peso,$estatura,$sangre,$alergia,$alerMedi,$psico);
    $exp->newExpediente();
    $exp->setExp();
    $exp->updateId();
    header("location: ../vistas/indexPaciente.php");
}catch (Exception $e){
    $error = $e->getMessage();
    include_once '../vistas/historialmedico.php';
}
