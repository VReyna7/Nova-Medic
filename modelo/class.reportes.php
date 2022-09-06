<?php
require_once("class.conexion.php");
class Reportes{
    public $descripcion;
    public $reportante;
    public $reportado;
    public $rol;
    
    public function setReporte($descripcion,$reportante,$reportado,$rol){   

        if(!empty($descripcion)){
            $this->descripcion = $descripcion;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($reportante)){
            $this->reportante = $reportante;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($reportado)){
            $this->reportado = $reportado;
        }else {
            throw new Exception("Error, Descripción vacia");
        }

        if(!empty($rol)){
            $this->rol = $rol;
        }else {
            throw new Exception("Error, Descripción vacia");
        }
    } 

// para subir la información a la base
    public function subirReporte(){
        $cn = new Conexion();
        //data base handle
        $dbh = $cn->get_conexion();
        $sql = "INSERT INTO reportes (descripcion,reportante,reportado,Rolreportado) VALUES (:descripcion,:reportante,:reportado,:rol)";
        try{
            $stmt = $dbh->prepare($sql);
            $stmt-> bindParam(':descripcion', $this->descripcion);
            $stmt->bindParam(':reportante', $this->reportante);
            $stmt->bindParam(':reportado', $this->reportado);
            $stmt->bindParam(':rol', $this->rol);
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


        //busca el cliente para el inicio de sesion
        public function searchReports($espec)
        {
            $dbh = new Conexion;
            $conexion = $dbh->get_conexion();
            $sql = 'Select * from reportes where rolReportado=:espec ';
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":espec", $espec);
            $stmt->execute();
            return  $stmt->rowCount();
        }
        
              
    public function deleteConsulta($idC,$idD)
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "delete from reportes where cliente=:cliente and doctor=:doctor";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":cliente", $idC);
        $stmt->bindParam(":doctor", $idD);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }


    public function getNombreCompletoDoc($idDoc){
        $conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select nombre, apellido from doctor where id=:id";
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