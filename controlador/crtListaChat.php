<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.consulta.php');
require_once('../modelo/class.doctor.php');

$chat = new Chat();
$consult = new Consulta();
$doc = new Doctor;

$nameC = isset($_GET['nameC'])?$_GET['nameC']:"";
$nameDC = isset($_GET['NameDC'])?$_GET['NameDC']:"";
$idDC = isset($_GET['idDC'])?$_GET['idDC']:"";
$idC = isset($_GET['idC'])?$_GET['idC']:"";
$espec = isset($_GET['espe'])?$_GET['espe']:"";

$doc->setDoctor($idDC);
$doc->cambiarEstado(2);

if($chat->searchChat($idC,$idDC)){
    header("location:../vistas/chat.php?");
}else{
    $chat->CrearChat($nameC,$nameDC,$idC,$idDC, $espec);
    $consult->deleteConsulta($idC,$idDC);
    header("location:../vistas/chat.php?&idC=".$idC."&idDoc=".$idDC);
}

	

?>
