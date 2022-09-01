<?php

require_once 'class.conexion.php';
require_once 'class.userSession.php';

class Mostrar{

    public function mostrarReportes(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $sql = "Select * from reportes order by id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $reporte = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reporte;
    }


    public function getNombreCompleto($idCliente){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select nombre, apellido from cliente where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$idCliente);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		$nombre = $datos['nombre'];
		$apellido = $datos['apellido'];
		return $nombre. " ". $apellido;
	}

    public function getNombreCompletoP($idCliente){
        $conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select nombre, apellido from profesional where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$idCliente);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		$nombre = $datos['nombre'];
		$apellido = $datos['apellido'];
		return $nombre. " ". $apellido;
    }
    }


?>