<?php
class Consulta{
    public $descripcion;
    public $idC;
    public $idD;
    
    public function setConsul($idC,$idD,$descripcion){   
        if (isset($idC) && isset($idD) && isset($descripcion)) {
            $this->descripcion = $descripcion;
            $this->idC = $idC;
            $this->idD = $idD;
        } else {
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    } 

    
    public function newConsulta()
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into consulta (cliente, doctor, descripcion) values (:cliente, :doctor, :descripcion)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cliente", $this->idC);
        $stmt->bindParam(":doctor", $this->idD);
        $stmt->bindParam(":descripcion",$this->descripcion);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
        }
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

    public function getImagenPerfil($idCliente){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select fotoPerfil from cliente where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$idCliente);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["fotoPerfil"];
	}

    public function getSexo($idCliente){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select sexo from cliente where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$idCliente);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["sexo"];
	}



}