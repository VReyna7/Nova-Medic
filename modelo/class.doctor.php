<?php
class Doctor
{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $pass;
    private $sexo;
    private $estado;
    private $titulos;
    private $foto;
    private $fechaNac;
	private $baneo;
    private $especialidad;

    public function veriData($nombre, $apellido, $pass, $correo, $sexo, $fechaNac, $especialidad)
    {
        if (isset($nombre) && isset($apellido) && isset($pass) && isset($correo) && isset($sexo) && isset($fechaNac) && isset($especialidad)) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pass = $pass;
            $this->correo = $correo;
            $this->sexo = $sexo;
            $this->fechaNac = $fechaNac;
            $this->especialidad = $especialidad;
        } else {
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    }

    public function newDoctor()
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into doctor (nombre, apellido, pass, correo, sexo, fecha_nac, espec) values (:nombre, :apellido, md5(:pass), :correo, :sexo, :fecha_nac, :espec)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":fecha_nac", $this->fechaNac);
        $stmt->bindParam(":espec", $this->especialidad);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function verTitulos($user)
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "select titulos from doctor where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $user);
        if (!$stmt) {
            throw new Exception("Error al conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }

    public function addTitulo($user, $titulos)
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into doctor titulos=:titulos where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":titulos", $titulos);
        $stmt->bindParam(":id", $user);
        if (!$stmt) {
            throw new Exception("Error al conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }

    public function extDoctor($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where correo=:correo';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo", $user);
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

    public function AceptarConsul($id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from consulta where doctor=:id';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctores;
    }

    public function searchDoctor($user, $pass)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where correo=:correo and pass=:pass';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo", $user);
        $stmt->bindParam(":pass", $pass);
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

    public function actuData($nombre,$ape,$mail,$sexo,$titulos){
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'update doctor set nombre=:nombre, apellido=:apellido, correo=:correo, sexo=:sexo, titulos=:titulos where id=:id';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":apellido",$ape);
        $stmt->bindParam(":correo",$mail);
        $stmt->bindParam(":sexo",$sexo);
        $stmt->bindParam(":titulos",$titulos);
        $stmt->bindParam(":id",$this->id);
        if(!$stmt){
            throw new Exception("Error con la base de datos");
        }else{
            $stmt->execute();
        }
    }

	public function actuPass($pass){
		$dbh = new Conexion;
		$conexion = $dbh->get_conexion();
		$sql = 'update doctor set pass=md5(:pass) where id=:id';
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(":pass",$pass);
		$stmt->bindParam(":id",$this->id);
		if(!$stmt){
			throw new Exception("Error con la base de datos");
		}else{
			$stmt->execute();
		}
	}

    public function allDoctores()
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'SELECT * FROM doctor ORDER BY id';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctores;
    }

    public function docGenerales()
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'SELECT * FROM doctor where espec = "Doctor General" ORDER BY id';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctores;
    }

	
    public function Baneo($id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = "update doctor set baneo=1 where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        if (!$stmt) {
            throw new Exception("Error al conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }

    /*public function getBaneo($id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = "select baneo from doctor where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        if (!$stmt) {
            throw new Exception("Error al conectar con la base de datos");
        } else {
            return $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            return $datauser['baneo'];
        }
	}*/

    public function docPsicos()
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'SELECT * FROM doctor where espec = "Psicologia" ORDER BY id';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctores;
    }

    public function docNutri()
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'SELECT * FROM doctor where espec = "Nutricionista" ORDER BY id';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $doctores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $doctores;
    }

    public function sesionDoctor($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select id from doctor where correo=:correo';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":correo", $user);
        if (!$stmt) {
            throw new Exception("Error. Hubo un fallo en la base de datos");
        } else {
            $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $datauser['id'];
        }
    }

    public function setDoctor($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from doctor where id=:id';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $user);
        if (!$stmt) {
            throw new Exception("Error. Hubo un fallo en la base de datos");
        } else {
            $stmt->execute();
            $datauser = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $datauser['id'];
            $this->nombre = $datauser['nombre'];
            $this->apellido = $datauser['apellido'];
            $this->pass = $datauser['pass'];
            $this->correo = $datauser['correo'];
            $this->sexo = $datauser['sexo'];
            $this->fechaNac = $datauser['fecha_nac'];
            $this->titulos = $datauser['titulos'];
            $this->foto = $datauser['fotoPerfil'];
            $this->estado = $datauser['estado'];
            $this->especialidad = $datauser['espec'];
			$this->baneo = $datauser['baneo'];
        }
    }

    //se utiliza para primero setear el doctor para saber el estado y luego verificarlo
    public function cambiarEstado($estado)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = "update doctor set estado=:estado where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":id", $this->id);
        if (!$stmt) {
            throw new Exception("Error al conectar con la base de datos");
        } else {
            $stmt->execute();
        }
    }

    public function actuFoto($route,$id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = "update doctor set fotoPerfil=:fotoPerfil where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":fotoPerfil", $route);
            $stmt->bindParam(":id", $id);
        if (!$stmt) {
            throw new Exception("Error con la base de datos");
        } else {
            $stmt->execute();
        }
    }
	 public function getchangePass($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select changePass from doctor where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["changePass"];
	}
	 public function actuContraDoc($id){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "select changePass from doctor where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		$datos = $stmt->fetch(PDO::FETCH_ASSOC);
		return $datos["changePass"];
	}

    public function setHistorial($id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from historial where idC=:id';
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        if (!$stmt) {
            throw new Exception("Error. Hubo un fallo en la base de datos");
        } else {
            $stmt->execute();
            $datauser = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datauser;
        }
    }

    public function modificarContra($id,$pass,$changePass){
		$conexion = new Conexion();
		$dbh = $conexion->get_conexion();
		$sql = "update doctor set pass = md5(:pass), changePass = :changePass where id=:id";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(":id",$id);
        $stmt->bindParam(":pass",$pass);
        $stmt->bindParam(":changePass",$changePass);
        if (!$stmt) {
            throw new Exception("Error con la base de datos");
        } else {
            $stmt->execute();
        }
	}

	public function crearHistorial($medico,$paciente,$razon,$descrip,$receta,$fecha,$idC,$idDoc){
		$dbh = new Conexion;
		$conexion = $dbh->get_conexion();
		$sql = 'insert into historial (medico, paciente, razon,descrip,receta,fecha,idC,idDoc) values (:medico,:paciente,:razon,:descrip,:receta,:fecha,:idC,:idDoc)';	
		$stmt = $conexion->prepare($sql);
		$stmt->bindParam(":medico",$medico);
		$stmt->bindParam(":paciente",$paciente);
		$stmt->bindParam(":razon",$razon);
		$stmt->bindParam(":descrip",$descrip);
		$stmt->bindParam(":receta",$receta);
		$stmt->bindParam(":fecha",$fecha);
		$stmt->bindParam(":idC",$idC);
		$stmt->bindParam(":idDoc",$idDoc);
		if(!$stmt){
			throw new Exception("Error con la base de datos");
		}else{
			$stmt->execute();
		}
	}

    //funciones get
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getFecha()
    {
        return $this->fechaNac;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getEspec()
    {
        return $this->especialidad;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getNombreCompleto()
    {
        return $this->nombre .' '.$this->apellido;
    }
    
    public function getPass()
    {
        return $this->pass;
    }

	public function getTitulos(){
		return $this->titulos;
	}

	public function getBaneo(){
		return $this->baneo;
	}
}
