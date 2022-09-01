<?php
require_once ('class.conexion.php');
class Foto{

    public function setFoto($destino){
    $cn = new Conexion();
    $dbh = $cn->get_conexion();
    $sql = "INSERT INTO  foto (foto) VALUES(:foto) ";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":foto", $destino);
    $stmt->execute();
    }

    public function getFoto(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
		$sql = "select  foto from foto";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		/*$datos = $stmt->fetch(PDO::FETCH_ASSOC);*/
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<img src="'.$fila["foto"].'" width="300" heigth="100"><br>';
        }
       /* return $datos;*/
		
	}
}
?>