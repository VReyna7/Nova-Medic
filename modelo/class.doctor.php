<?php
class Doctor{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $pass;
    private $sexo;
    private $estado;
    private $titulos;
    private $fechaNac;

    public function veriData($nombre,$apellido,$pass,$correo,$sexo,$fechaNac){
        if(isset($nombre) && isset($apellido) && isset($pass) && isset($correo) && isset($sexo) && isset($fechaNac)){
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pass = $pass;
            $this->correo = $correo;
            $this->sexo = $sexo;
            $this->fechaNac = $fechaNac;
        }else{
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    }

    public function newDoctor(){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into doctor (nombre, apellido, pass, correo, sexo, fecha_nac, estado) values (:nombre, :apellido, md5(:pass), :correo, :sexo, :fecha_nac, :estado)";
        $stmt = $conexion->prepare($sql) ;
        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":apellido",$this->apellido);
        $stmt->bindParam(":pass",$this->pass);
        $stmt->bindParam(":correo",$this->correo);
        $stmt->bindParam(":sexo",$this->sexo);
        $stmt->bindParam(":fecha_nac",$this->fechaNac);
        $stmt->bindParam(":estado",0);
        if(!$stmt){
            throw new Exception("Error. No se pudo conectar con la base de datos");
        }else{
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function verTitulos($user){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "select titulos from doctor where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $user);
        if(!$stmt){
            throw new Exception("Error al conectar con la base de datos");
        }else{
            $stmt->execute();
        }
    }

    public function addTitulo($user,$titulos){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into doctor titulos=:titulos where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":titulos", $titulos);
        $stmt->bindParam(":id", $user);
        if(!$stmt){
            throw new Exception("Error al conectar con la base de datos");
        }else{
            $stmt->execute();
        }
    }

    public function extDoctor($user){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where correo=:correo';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo",$user);
        if(!$stmt){
            throw new Exception("Error. fallo en la base de datos");
        }else{
            $stmt->execute();
            if($stmt->rowCount()){
                return true; 
            }else{
                return false;
            }
        }
    }

    public function searchDoctor($user, $pass){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where correo=:correo and pass=:pass';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo",$user);
        $stmt->bindParam(":pass",$pass);
        if(!$stmt){
            throw new Exception("Error. fallo en la base de datos");
        }else{
            $stmt->execute();
            if($stmt->rowCount()){
                return true; 
            }else{
                return false;
            }
        }
    }

    public function setDoctor($user){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where correo=:correo';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo",$user);
        if(!$stmt){
            throw new Exception("Error. Hubo un fallo en la base de datos");
        }else{
            $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $datauser['id'];
            $this->nombre = $datauser['nombre'];
            $this->apellido= $datauser['apellido'];
            $this->pass = $datauser['pass'];
            $this->correo= $datauser['correo'];
            $this->sexo= $datauser['sexo'];
            $this->fechaNac= $datauser['fecha_nac'];
            $this->titulos= $datauser['titulos'];
            $this->estado = $datauser['estado'];
        }
    }

    public function cambiarEstado($user){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql= "select estado from doctor where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id",$user);
        if(!$stmt){
            throw new Exception("Error con la base de datos");
        }else {
            $valor = $stmt->execute();
            if($valor==0 || $valor==null){
                $sql2="update doctor set estado=1";
            }else{
                $sql2="update doctor set estado=0";
            }
            $stmt = $conexion->prepare($sql2);
            $stmt->execute();
        }
    }

    //funciones get
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre."".$this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getSexo(){
        return $this->sexo;
    }
}
?>