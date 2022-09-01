<?php
require_once ('class.conexion.php');
class adminFoto{
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
    
    $sql = "INSERT INTO  adminitradorfoto (foto,idAdministrador) VALUES (:foto,:idAdministrador)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':foto',$this->ruta);
    $stmt->bindParam(':idAdministrador',$this->id);
   
    $stmt->execute();
    }
    public function updateFoto(){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
        $sql = "Update adminitradorfoto set foto=:foto where idAdministrador=:idAdministrador";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':foto',$this->ruta);
        $stmt->bindParam(':idAdministrador',$this->id);
        $stmt->execute();
        }

    public function Foto($id){
        $cn = new Conexion();
        $dbh = $cn->get_conexion();
		$sql = "SELECT * FROM adminitradorfoto WHERE idAdministrador=:id";
		$stmt = $dbh->prepare($sql);
        $stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
        $fotoRoute = $datos['foto'];
        return $fotoRoute;

		
	}
   
}
?>