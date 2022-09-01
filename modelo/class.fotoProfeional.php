<?php
require_once ('class.conexion.php');
class profeionalFoto{
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
    
    $sql = "INSERT INTO  profesionalfoto (foto,idProfesional) VALUES (:foto,:idProfesional)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':foto',$this->ruta);
    $stmt->bindParam(':idProfesional',$this->id);
   
    $stmt->execute();
    }
    public function updateFoto(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $sql = "Update profesionalfoto set foto=:foto where idProfesional=:idProfesional";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':foto',$this->ruta);
        $stmt->bindParam(':idProfesional',$this->id);
        $stmt->execute();
        }

    public function Foto($id){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
		$sql = "SELECT * FROM profesionalfoto WHERE idProfesional=:id";
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