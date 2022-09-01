<?php
class Admin
{
    private $id;
    private $nombre;
    private $apellido;
    private $pass;
    private $correo;
    private $sexo;
    private $foto;
    private $fechaNac;

    public function veriData($nombre, $apellido, $pass, $correo, $sexo, $fechaNac)
    {
        if (isset($nombre) && isset($apellido) && isset($pass) && isset($correo) && isset($sexo) && isset($fechaNac)) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pass = $pass;
            $this->correo = $correo;
            $this->sexo = $sexo;
            $this->fechaNac = $fechaNac;
        } else {
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    }

    public function newAdmin()
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into admin (nombre, apellido, pass, correo, sexo, fecha_nac) values (:nombre, :apellido, md5(:pass), :correo, :sexo, :fecha_nac)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":fecha_nac", $this->fechaNac);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function newDoctor()
    {
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into admin (nombre, apellido, pass, correo, sexo, fecha_nac) values (:nombre, :apellido, md5(:pass), :correo, :sexo, :fecha_nac)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":apellido", $this->apellido);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->bindParam(":correo", $this->correo);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":fecha_nac", $this->fechaNac);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function extAdmin($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from admin where correo=:correo';
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

    public function searchAdmin($user, $pass)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from admin where correo=:correo and pass=:pass';
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

    public function allAdmins()
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'select * from admin order by id';
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $admins;
    }

    public function sesionAdmin($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select id from admin where correo=:correo';
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

    public function setAdmin($user)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = 'Select * from admin where id=:id';
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
            $this->estado = $datauser['estado'];
            $this->foto = $datauser['fotoPerfil'];
        }
    }

    public function actuFoto($route,$id)
    {
        $dbh = new Conexion;
        $conexion = $dbh->get_conexion();
        $sql = "update admin set fotoPerfil=:fotoPerfil where id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":fotoPerfil", $route);
        $stmt->bindParam(":id", $id);
        if (!$stmt) {
            throw new Exception("Error con la base de datos");
        } else {
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
}
