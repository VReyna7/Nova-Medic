<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');
require_once('../modelo/class.consulta.php');

$chat = new Chat();
$consult = new Consulta();

$idDC = isset($_GET['idDoc'])?$_GET['idDoc']:"";
$idC = isset($_GET['dC'])?$_GET['dC']:"";


echo $idC;
echo $idDC;
$chat->deleteMensajes($idC,$idDC);
$chat->deleteChat($idC,$idDC);
header("location:../vistas/aceptarConsultas.php");


	

?>