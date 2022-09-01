<?php
require_once("class.conexion.php");
class Reportes{
    public $titulo;
    public $descripcion;
    public $idC;
    public $idP;
    public $tipo;
    
    public function setReporte($titulo,$descripcion,$idC,$idP,$tipo){   
        if(!empty($titulo)){
            $this->titulo = $titulo;
        }else{
            throw new Exception("Error, Titulo vacio");
        }

        if(!empty($descripcion)){
            $this->descripcion = $descripcion;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($idC)){
            $this->idC = $idC;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($idP)){
            $this->idP = $idP;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($tipo)){
            $this->tipo = $tipo;
        }else {
            throw new Exception("Error, Descripción vacia");
        }
    } 
// para subir la información a la base
    public function subirReporte(){
        $cn = new Conexion();
        //data base handle
        $dbh = $cn->get_conexion();
        $sql = "INSERT INTO reportes (titulo,descripcion,idPro,idClient,reportado) VALUES (:titulo, :descripcion,:idPro,:idClient,:reportado)";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt-> bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':idPro', $this->idP);
            $stmt->bindParam(':idClient', $this->idC);
            $stmt->bindParam(':reportado', $this->tipo);
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }//bindparam es para subir a la base de datos.


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