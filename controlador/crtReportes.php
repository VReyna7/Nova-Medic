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
$vista = isset($_POST['vistas']) ? $_POST['vistas'] : "";


$report->setReporte($descripcion,$reportante,$nombreReportado,$rol,$idReportante,$idReportado);
$report->subirReporte();

if($rol=="Doctor"){
    if($vista =="chat"){
      header("location:../vistas/chat.php?idDoc=".$idReportado."&idC=".$idReportante);
    }else{
        header("location:../vistas/doctoresConsul.php?category=".$category);
    }

}else{
    if($vista =="chat"){
        header("location:../vistas/chat.php");
    }else{
        header("location:../vistas/aceptarConsultas.php");
    }
}


?>