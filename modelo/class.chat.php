<?php
	include_once '../modelo/class.conexion.php';
class Chat{

	public function mostrarMsg($idProf, $idClnt){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Select * from mensaje where idProfesional=:idProf and idCliente=:idClnt";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":idProf",$idProf);
		$stmt->bindParam(":idClnt",$idClnt);
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function verUltimoMsg($idProf, $idClnt){
			$conexion = new Conexion();
			$dbh = $conexion->get_conexion();
			$sql = "Select * from mensaje where idProfesional=:idProf and idCliente=:idClnt order by id desc ";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":idProf",$idProf);
			$stmt->bindParam(":idClnt",$idClnt);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
	}

	public function CrearChat($nameC,$nameP,$idC,$idP,$apeP,$apeC){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into chat (nameP, nameC, idC, idP, apeP, apeC) values (:nameP, :nameC, :idC, :idP, :apeP , :apeC)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":nameC",$nameC);
		$stmt->bindParam(":nameP",$nameP);
		$stmt->bindParam(":idC",$idC);
		$stmt->bindParam(":idP",$idP);
		$stmt->bindParam(":apeP",$apeP);
		$stmt->bindParam(":apeC",$apeC);
		$stmt->execute();
	}

	public function veriChat($nameP,$nameC,$apeP,$apeC){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		try {
			$sql = "Select * from chat where nameP=:nameP and nameC=:nameC and apeP=:apeP and apeC=:apeC";
			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(":nameP",$nameP);
			$stmt->bindParam(":nameC",$nameC);
			$stmt->bindParam(":apeP",$apeP);
			$stmt->bindParam(":apeC",$apeC);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			return $data;
		} catch (Exeption $e) {
			return $e->getMessage();
		}
	}


	public function enviarMsg($user, $msg, $idProf, $idClnt, $tipo){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "Insert into mensaje (user, msg, idProfesional, idCliente, tipo) values (:user, :msg, :idProf, :idClnt, :tipo)";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":user",$user);
		$stmt->bindParam(":msg",$msg);
		$stmt->bindParam(":idProf",$idProf);
		$stmt->bindParam(":idClnt",$idClnt);
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
		return $extChat;
	}
}
?>
