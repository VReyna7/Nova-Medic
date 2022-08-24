<?php
class Cliente{
    private $id;
    private $nombre;
    private $apellido;
    private $pass;
    private $correo;
    private $sexo;
    private $fechaNac;
    private $id_exp;

    public function veriData($nombre,$apellido,$pass,$correo,$sexo,$fechaNac){
        if(!empty($nombre) && !empty($apellido) && !empty($pass) && !empty($correo) && isset($sexo) && !empty($fechaNac)){
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

    //Funcion que registra al cliente
    public function newCliente(){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into cliente (nombre, apellido, pass, correo, sexo, fecha_nac) values (:nombre, :apellido, md5(:pass), :correo, :sexo, :fecha_nac)";
        $stmt = $conexion->prepare($sql) ;
        $stmt->bindParam(":nombre",$this->nombre);
        $stmt->bindParam(":apellido",$this->apellido);
        $stmt->bindParam(":pass",$this->pass);
        $stmt->bindParam(":correo",$this->correo);
        $stmt->bindParam(":sexo",$this->sexo);
        $stmt->bindParam(":fecha_nac",$this->fechaNac);
        if(!$stmt){
            throw new Exception("Error. No se pudo conectar con la base de datos");
        }else{
            $stmt->execute();
            //Se a registrado correctamente
        }
    }
    
    //revisa si existe un cliente con el mismo correo
    public function extCliente($user){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from cliente where correo=:correo';
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

    //busca el cliente para el inicio de sesion
    public function searchCliente($user, $pass){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from cliente where correo=:correo and pass=:pass';
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

    public function setCliente($user){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from cliente where correo=:correo';
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
        }
    }

    //funciones get del cliente
    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getIdExp(){
        return $this->id_exp;
    }
}
?>