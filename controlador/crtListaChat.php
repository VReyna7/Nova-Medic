<?php session_start(); ?>
<?php
require_once('../modelo/class.conexion.php');
require_once('../modelo/class.chat.php');

$chat = new Chat();
$userSession = new Sesion();
$nameC = isset($_GET['nameC'])?$_GET['nameC']:"";
$nameDC = isset($_GET['NameDC'])?$_GET['NameDC']:"";
$idDC = isset($_GET['idDC'])?$_GET['idDC']:"";
$idC = isset($_GET['idC'])?$_GET['idC']:"";
$apeC = isset($_GET['ApeC'])?$_GET['ApeC']:"";
$apeDC = isset($_GET['apeDC'])?$_GET['apeDC']:"";

$msg = "Hola Estoy Interesado en el trabajo";

$veri = $chat->veriChat($nameC,$nameDC,$idC,$idDC,$apeDC,$apeC);
try{
		if(!empty($veri['nameP']) && !empty($veri['nameC']) && !empty($veri['apeP']) && !empty($veri['apeC'])){
			header("location:../vistas/vis.chat.php?id=". $idC);
		}else{
			$chat->CrearChat($nameC,$nameP,$idC,$idP,$apeP,$apeC);
			header("location:../vistas/vis.chat.php?id=". $idC);
		}
} catch (Exception $e) {
	echo  "ekisde" . $e->getMessage();
}


?>