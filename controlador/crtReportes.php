<?php

require_once("../modelo/class.sesion.php");
require_once("../modelo/class.doctor.php");
require_once("../modelo/class.reportes.php");

$sesion = new Sesion();
$doc = new Doctor;
$report = new Reportes();

$rol = isset($_POST['rol']) ? $_POST['rol'] : "";
$nombreReportado = isset($_POST['nombreReportado']) ? $_POST['nombreReportado'] : "";
$reportante = isset($_POST['Reportante']) ? $_POST['Reportante'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$category = isset($_POST['category']) ? $_POST['category'] : "";
$idReportado = isset($_POST['idReportado']) ? $_POST['idReportado'] : "";
$idReportante = isset($_POST['idReportante']) ? $_POST['idReportante'] : "";


$report->setReporte($descripcion,$reportante,$nombreReportado,$rol,$idReportante,$idReportado);
$report->subirReporte();

if($rol=="Doctor"){
    header("location:../vistas/doctoresConsul.php?category=".$category);
    
}else{
    header("location:../vistas/aceptarConsultas.php");
}


?>