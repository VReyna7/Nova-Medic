<?php
class Chat{
	public function mostrarMsg($idDoc, $idClnt){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where idDoctor=:idDoctor and idCliente=:idClnt";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":idDoctor",$idDoc);
		$stmt->bindParam(":idClnt",$idClnt);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function verUltimoMsg($idDoc, $idClnt){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "Select * from mensaje where idDoctor=:idDoctor and idCliente=:idClnt order by id desc ";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":idDoctor",$idDoc);
			$stmt->bindParam(":idClnt",$idClnt);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
	}

	        
    public function deleteMensajes($idC,$idD)
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "delete from mensaje where idCliente=:cliente and idDoctor=:doctor";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cliente", $idC);
        $stmt->bindParam(":doctor", $idD);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }



	public function CrearChat($nameC,$nameDC,$idC,$idDC, $espec){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into chat (nameDR, nameC, idC, idDC, espec) values (:nameDC, :nameC, :idC, :idDC, :espec)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":nameDC",$nameDC);
		$stmt->bindParam(":nameC",$nameC);
		$stmt->bindParam(":idC",$idC);
		$stmt->bindParam(":idDC",$idDC);
		$stmt->bindParam(":espec",$espec);
		$stmt->execute();
	}

	public function deleteChat($idC,$idD)
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "delete from chat where idC=:cliente and idDC=:doctor";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cliente", $idC);
        $stmt->bindParam(":doctor", $idD);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }


	public function veriChatClient($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from chat where idC=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		if(!$stmt){
			throw new Exception("Error al conectar con la base de datos");
		}else{
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		
	}

	public function veriChatDoctor($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from chat where idDC=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		if(!$stmt){
			throw new Exception("Error al conectar con la base de datos");
		}else{
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
		}
		
	}

	public function getImagenPerfilClient($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select fotoPerfil from cliente where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["fotoPerfil"];
	}

	public function getImagenPerfilDoctor($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select fotoPerfil from doctor where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["fotoPerfil"];
	}

	public function enviarMsg($nombre,$msg,$idDoc,$idCliente,$tipo,$estado){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into mensaje (usuario,msg,idDoctor,idCliente,tipo,estado) values (:nombre,:msg,:idDoc,:idCliente,:tipo,:estado)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":nombre",$nombre);
		$stmt->bindParam(":msg",$msg);
		$stmt->bindParam(":idDoc",$idDoc);
		$stmt->bindParam(":idCliente",$idCliente);
		$stmt->bindParam(":tipo",$tipo);
		$stmt->bindParam(":estado",$estado);
		$stmt->execute();
	}

	public function searchChat($idC, $idDoctor)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from chat where idC=:idC and idDC=:idDC';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":idC", $idC);
        $stmt->bindParam(":idDC", $idDoctor);
        if (!$stmt) {
            throw new Exception("Error. fallo en la base de datos");
        } else {
            $stmt->execute();
            if ($stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        }
    }


}
?>