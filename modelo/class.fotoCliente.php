<?php
require_once ('class.conexion.php');
class clienteFoto{
    public $ruta;
    public $id;
    /*public $imagen;*/

    public function setDato($ruta,$id){
        $this->ruta = $ruta;
        $this->id = $id;
    }

    public function InsertFoto(){
    $cn = new Conexion();
    $dbh = $cn->get_conexion();
    
    $sql = "INSERT INTO  clietefoto (foto,idCliente) VALUES (:foto,:idCliente)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':foto',$this->ruta);
    $stmt->bindParam(':idCliente',$this->id);
   
    $stmt->execute();
    }
    public function updateFoto(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $sql = "Update clietefoto set foto=:foto where idCliente=:idCliente";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':foto',$this->ruta);
        $stmt->bindParam(':idCliente',$this->id);
        $stmt->execute();
        }

    public function Foto($id){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
		$sql = "SELECT * FROM clietefoto WHERE idCliente=:id";
		$stmt = $dbh->prepare($sql);
        $stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
        $fotoRoute = $datos['foto'];
        return $fotoRoute;

		
	}
    public function getid(){
        echo  $this->id;
    }

   
}
?>