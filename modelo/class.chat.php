<?php
class Chat{
	public function mostrarMsg($idDoc, $idClnt){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where idDoc=:idDoctor and idCliente=:idClnt";
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
			$sql = "Select * from mensaje where idDoc=:idDoctor and idCliente=:idClnt order by id desc ";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":idDoctor",$idDoc);
			$stmt->bindParam(":idClnt",$idClnt);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
	}

	public function CrearChat($nameC,$nameDC,$idC,$idDC,$apeDC,$apeC){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into chat (nameDR, nameC, idC, idDC, apeC, apeDR) values (:nameDC, :nameC, :idC, :idDC, :apeC , :apeDR)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":nameDR",$nameDC);
		$stmt->bindParam(":nameC",$nameC);
		$stmt->bindParam(":idC",$idC);
		$stmt->bindParam(":idDC",$idDC);
		$stmt->bindParam(":apeC",$apeC);
		$stmt->bindParam(":apeDR",$apeDR);
		$stmt->execute();
	}

	public function veriChat($nameDC,$nameC,$apeDC,$apeC){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from chat where nameDR=:nameDC and nameC=:nameC and apeDC=:apeDC and apeC=:apeC";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":nameDR",$nameDC);
		$stmt->bindParam(":nameC",$nameC);
		$stmt->bindParam(":apeC",$apeC);
		$stmt->bindParam(":apeDR",$apeDC);
		if(!$stmt){
			throw new Exception("Error al conectar con la base de datos");
		}else{
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
		}
		
	}

	public function enviarMsg($user, $msg, $idDC, $idC, $tipo){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into mensaje (user, msg, idDoctor, idCliente, tipo) values (:user, :msg, :idDC, :idC, :tipo)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":user",$user);
		$stmt->bindParam(":msg",$msg);
		$stmt->bindParam(":idDoctor",$idDC);
		$stmt->bindParam(":idCliente",$idC);
		$stmt->bindParam(":tipo",$tipo);
		$stmt->execute();
	}

	public function verChatP($user){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where user=:user";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":user",$user);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
}
?>