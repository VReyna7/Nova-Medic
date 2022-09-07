<?php

require_once("../modelo/class.conexion.php");
require_once("../modelo/class.reportes.php");
require_once("../modelo/class.cliente.php");
require_once("../modelo/class.doctor.php");

$reportes = new Reportes;
$doc = new Doctor;
$client = new Cliente;


$idReportado = isset($_GET['idReportado'])?$_GET['idReportado']:"";
$idReportante = isset($_GET['idReportante'])?$_GET['idReportante']:"";
$rol = isset($_GET['rol'])?$_GET['rol']:"";
$accion = isset($_GET['accion'])?$_GET['accion']:"";

if($accion=='Eliminar'){
        $reportes->deleteReport($idReportante,$idReportado);
        header("location: ../vistas/reporte.php");
}else{
        if($rol=="Doctor"){
            $doc->Baneo($idReportado);
            //header("location: ../vistas/reporte.php");
        }else{
            $client->Baneo($idReportado);
           // header("location: ../vistas/reporte.php");
        }
}

?>