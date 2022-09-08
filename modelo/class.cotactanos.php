<?php
class contactos
{
    private $Nombre;
    private $apellido;
    private $correo;
    private $sexo;

    public function veriData($Nombre, $apellido, $sexo,$correo)
    {
        if (!empty($Nombre) && !empty($apellido) && !empty($sexo) && !empty($correo) ) {
            $this->Nombre = $Nombre;
            $this->apellido = $apellido;
            $this->correo = $correo;
            $this->sexo = $sexo;
        } else {
            throw new Exception('Error, Tiene que rellenar todos los datos');
        }
    }
    public function newContactos(){
        $dbh = new Conexion();
        $conexion = $dbh->get_conexion();
        $sql = "insert into contactanos (Nombre, apellido, sexo ,correo) values (:Nombre, :apellido, :sexo, :correo )";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":apellido",$this->apellido);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":correo", $this->correo);
        if (!$stmt) {
            throw new Exception("Error. No se pudo conectar con la base de datos");
        } else {
            $stmt->execute();
            //Se a registrado correctamente
        }
    }

    public function getName(){
        return $this->Nombre;

    }


}
?>